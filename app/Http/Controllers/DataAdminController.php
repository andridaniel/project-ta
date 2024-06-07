<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataAdminController extends Controller
{
    public function index()
    {
        $data_admin = Admin::with(['User', 'User.Role'])->paginate(5);
        return view('pages.pagesadmin.data_admin', compact('data_admin'));
    }

    public function TambahDataAdmin(User $user)
    {
        if(!$user){
            return redirect()->route('userregister')->with('error', 'Data gagal ditambahkan.');

        }

        return view('pages.pagesadmin.tambah_data_admin', compact('user'));
    }

    //menambahkan data admin
    public function store (Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);


    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    }

    //upload gambar
    // $gambar = $request->file('gambar_profile');
    // $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
    // $path = 'dist/img/' . $fileName;

    // file_put_contents($path, file_get_contents($gambar));

    $validated_input = $validator->validated();

    // Menyimpan user_id
    $validated_input['user_id'] = auth()->user()->id;

    // Menyimpan gambar
    // $validated_input['gambar_profile'] = $fileName;

    // Menyimpan data
    $user->Admin()->create($validated_input);

    return redirect()->route('data_admin')->with('success', 'Data Admin Berhasil Ditambahkan!');
    }



    //menapilkan data admin dari tabel user dan Admin
    public function show($id){

        $data_admin = Admin::with(["user"])->where("id",$id)->first();

        if (!$data_admin) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.detail_admin', compact('data_admin'));
    }


    //menghapus data admin
    public function delete($id)
    {
        // Temukan guru pembimbing berdasarkan ID menggunakan Eloquent
        $delete_admin = Admin::with(['User', 'User.Role'])->find($id);
        if (!$delete_admin) {
            return redirect()->back()->with('error', 'Record not found');
        }

        // Hapus pengguna terkait
        $user_id = $delete_admin->user->id; // Dapatkan ID pengguna
        User::where('id', $user_id)->delete(); // Hapus pengguna berdasarkan ID

        // Hapus data admin
        $delete_admin->delete();

        // Redirect kembali ke halaman tabel admin setelah penghapusan.
        return redirect()->route('data_admin')->with('success', 'Data admin berhasil dihapus!');
    }


    //update data admin

    public function edit($id)
    {
        $update_admin = Admin::with(['User', 'User.Role'])->find($id);
        if (!$update_admin) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.update_admin', compact('update_admin'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'gambar_profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make gambar_profile nullable to allow updating without changing the image
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        // Find the admin record by ID
        $update_admin = Admin::with('User')->find($id);

        if (!$update_admin) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found');
        }

        // Update the admin's data
        $update_admin->tempat_lahir = $request->tempat_lahir;
        $update_admin->tgl_lahir = $request->tgl_lahir;
        $update_admin->jenis_kelamin = $request->jenis_kelamin;
        $update_admin->agama = $request->agama;
        $update_admin->alamat = $request->alamat;

        // Save the admin's changes
        $update_admin->save();

        // Update the associated user's data
        $update_admin->User->name = $request->name;
        $update_admin->User->email = $request->email;
        $update_admin->User->no_hp = $request->no_hp;


        // Save the user's changes
        $update_admin->User->save();

        // Handle updating the image if provided
        if ($request->hasFile('gambar_profile')) {
            $gambar = $request->file('gambar_profile');
            $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
            $path = 'dist/img/' . $fileName;

            // Simpan gambar baru
            file_put_contents($path, file_get_contents($gambar));
            // Setelah menyimpan gambar baru, Anda dapat menyimpan nama file ke dalam properti 'gambar_profile' di dalam database
            $update_admin->User->gambar_profile = $fileName;

            // Simpan perubahan ke dalam database
            $update_admin->User->save();
        }

        // Redirect back to the admin edit page with a success message
        return redirect()->route('data_admin', $id)->with('success', 'Data Admin Berhasil Di Update');
    }





}
