<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $data_siswa = Siswa::with(['User', 'User.Role'])->get();
        return view('pages.pagesadmin.data_siswa', compact('data_siswa'));

    }

    public function TambahDataSiswa(User $user)
    {
        $guru_pembimbing = User::where('role_id', 2)->get();
        if(!$user){
            return redirect()->route('userregister')->with('error','data gagal ditambahkan.');

        }
        return view('pages.pagesadmin.tambah_data_siswa', compact('user', 'guru_pembimbing'));
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'guru_pembimbing_id' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'nama_orangtua' => 'required',
            'no_hp_orangtua' => 'required',
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

         // Menyimpan guru_pembimbing_id
        $validated_input['guru_pembimbing_id'] = $request->guru_pembimbing_id; // Menggunakan nilai dari form

        // Menyimpan data
        $user->Siswa()->create($validated_input);

        return redirect()->route('data_siswa')->with('success', 'Product created successfully!');
    }


    //menapilkan data admin dari tabel user dan Admin
    public function show($id){

        $data_siswa = Siswa::with(["user"])->where("id",$id)->first();

        if (!$data_siswa) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.detail_siswa', compact('data_siswa'));
    }


    public function delete($id)
    {
        // Temukan guru pembimbing berdasarkan ID menggunakan Eloquent
        $delete_siswa = Siswa::with(['User', 'User.Role'])->find($id);
        if (!$delete_siswa) {
            return redirect()->back()->with('error', 'Record not found');
        }

        // Hapus pengguna terkait
        $user_id = $delete_siswa->user->id; // Dapatkan ID pengguna
        User::where('id', $user_id)->delete(); // Hapus pengguna berdasarkan ID

        // Hapus data admin
        $delete_siswa->delete();

        // Redirect kembali ke halaman tabel admin setelah penghapusan.
        return redirect()->route('data_siswa')->with('success', 'data berhasil dihapus!');
    }





    public function edit($id)
    {
        $update_siswa = Siswa::with(['User', 'User.Role', 'hasGuruPembimbing', 'hasGuruPembimbing.User'])->find($id);
        $guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->get();

        if (!$update_siswa) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.update_siswa', compact('update_siswa', 'guru_pembimbing'));
    }



    //update data siswa
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'guru_pembimbing_id' => 'required',
            'nisn' => 'required|string|max:25',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'nama_orangtua' => 'required|string|max:255',
            'no_hp_orangtua' => 'required|string|max:255',
            'gambar_profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make gambar_profile nullable to allow updating without changing the image
            // Add validation rules for other fields as needed
        ]);

        // Find the admin record by ID
        $update_siswa = Siswa::with('User')->find($id);

        if (!$update_siswa) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found');
        }

        // Update the admin's data
        $update_siswa->guru_pembimbing_id = $request->guru_pembimbing_id;
        $update_siswa->tempat_lahir = $request->tempat_lahir;
        $update_siswa->tgl_lahir = $request->tgl_lahir;
        $update_siswa->jenis_kelamin = $request->jenis_kelamin;
        $update_siswa->agama = $request->agama;
        $update_siswa->alamat = $request->alamat;
        $update_siswa->kelas = $request->kelas;
        $update_siswa->nama_orangtua = $request->nama_orangtua;
        $update_siswa->no_hp_orangtua = $request->no_hp_orangtua;
        $update_siswa->gambar_profile = $request->gambar_profile;




        // Save the admin's changes
        $update_siswa->save();

        // Update the associated user's data
        $update_siswa->User->name = $request->name;
        $update_siswa->User->email = $request->email;
        $update_siswa->User->no_hp = $request->no_hp;

        // Save the user's changes
        $update_siswa->User->save();

       // Handle updating the image if provided
       if ($request->hasFile('gambar_profile'))
       {
            $gambar = $request->file('gambar_profile');
            $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
            $path = 'dist/img/' . $fileName;

            // Simpan gambar baru
            file_put_contents($path, file_get_contents($gambar));

            // Setelah menyimpan gambar baru, Anda dapat menyimpan nama file ke dalam properti 'gambar_profile' di dalam database
            $update_siswa->gambar_profile = $fileName;

            // Simpan perubahan ke dalam database
            $update_siswa->save();
        }

        // Redirect back to the admin edit page with a success message
        return redirect()->route('data_siswa', $id)->with('success', 'Data Siswa record updated successfully.');
    }

}
