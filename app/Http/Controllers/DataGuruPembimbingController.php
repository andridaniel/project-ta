<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru_Pembimbing;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DataGuruPembimbingController extends Controller
{
    public function index()
    {
        $data_GuruPembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->get();

        return view('pages.pagesadmin.data_guru_pembimbing', compact('data_GuruPembimbing'));
    }

    public function TambahDataGuruPembimbing(User $user)
    {
        if(!$user){
            return redirect()->route('userregister')->with('error', 'Data gagal ditambahkan.');

        }

        return view('pages.pagesadmin.tambah_data_guru_pembimbing', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'wali_kelas' => 'required',
            'gambar_profile' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        //upload gambar
        $gambar = $request->file('gambar_profile');
        $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
        $path = 'dist/img/' . $fileName;

        file_put_contents($path, file_get_contents($gambar));

        $validated_input = $validator->validated();

        // Menyimpan user_id
        $validated_input['user_id'] = auth()->user()->id;

        // Menyimpan gambar
        $validated_input['gambar_profile'] = $fileName;

        // Menyimpan data
        $user->Guru_Pembimbing()->create($validated_input);

        return redirect()->route('data_guru_pembimbing')->with('success', 'Product created successfully!');
    }

    //menapilkan data guru pembimbing dari tabel admins
    public function show($id){

        $data_guru_pembimbing = Guru_Pembimbing::with(["user"])->where("id",$id)->first();


        if (!$data_guru_pembimbing) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.detail_guru_pembimbing', compact('data_guru_pembimbing'));
    }

    public function delete($id)
    {
        // Temukan guru pembimbing berdasarkan ID menggunakan Eloquent
        $delete_guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->find($id);
        if (!$delete_guru_pembimbing) {
            return redirect()->back()->with('error', 'Record not found');
        }

        // Hapus pengguna terkait
        $user_id = $delete_guru_pembimbing->user->id; // Dapatkan ID pengguna
        User::where('id', $user_id)->delete(); // Hapus pengguna berdasarkan ID

        // Hapus guru pembimbing
        $delete_guru_pembimbing->delete();

        // Redirect kembali ke halaman tabel guru pembimbing setelah penghapusan.
        return redirect()->route('data_guru_pembimbing')->with('success', 'Guru Pembimbing deleted successfully!');
    }


    //update data guru pembimbing
    public function edit($id)
    {
        $update_guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->find($id);
        if (!$update_guru_pembimbing) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.update_guru_pembimbing', compact('update_guru_pembimbing'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255',
            'gambar_profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make gambar_profile nullable to allow updating without changing the image
            // Add validation rules for other fields as needed
        ]);

        // Find the admin record by ID
        $update_guru_pembimbing = Guru_Pembimbing::with('User')->find($id);

        if (!$update_guru_pembimbing) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found');
        }

        // Update the admin's data
        $update_guru_pembimbing->tempat_lahir = $request->tempat_lahir;
        $update_guru_pembimbing->tgl_lahir = $request->tgl_lahir;
        $update_guru_pembimbing->jenis_kelamin = $request->jenis_kelamin;
        $update_guru_pembimbing->agama = $request->agama;
        $update_guru_pembimbing->alamat = $request->alamat;
        $update_guru_pembimbing->wali_kelas = $request->wali_kelas;

        // Save the admin's changes
        $update_guru_pembimbing->save();

        // Update the associated user's data
        $update_guru_pembimbing->User->name = $request->name;
        $update_guru_pembimbing->User->email = $request->email;
        $update_guru_pembimbing->User->no_hp = $request->no_hp;

        // Save the user's changes
        $update_guru_pembimbing->User->save();

        // Handle updating the image if provided
        if ($request->hasFile('gambar_profile')) {
            // Your image update logic here
        }

        // Redirect back to the admin edit page with a success message
        return redirect()->route('data_guru_pembimbing', $id)->with('success', 'Guru pembimbing record updated successfully.');
    }

}
