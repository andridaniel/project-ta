<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\Tempat_Training;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilePenggunaController extends Controller
{
    public function index(){
        // Mendapatkan pengguna yang sedang diautentikasi
        $user = auth()->user();

         // Mendefinisikan variabel yang akan digunakan
         $alamat = $guru_pembimbing_id = $nama_guru_pembimbing = $nisn = $tempat_lahir = $tgl_lahir = $agama = $jenis_kelamin = $wali_kelas = $kelas = $nama_orangtua = $no_hp_orangtua = $gambar_profile = null;

        // Mendapatkan data alamat sesuai peran pengguna
        if ($user->isAdmin()) {
            $alamat = $user->admin->alamat;
            $tempat_lahir = $user->admin->tempat_lahir;
            $tgl_lahir = $user->admin->tgl_lahir;
            $agama = $user->admin->agama;
            $jenis_kelamin = $user->admin->jenis_kelamin;

        } elseif ($user->isSiswa()) {

            $alamat = $user->siswa->alamat;
            $guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->first(); // Mengambil data guru pembimbing
            $nama_guru_pembimbing = $guru_pembimbing->user->name; // Mengambil nama pengguna dari model User yang terkait dengan guru pembimbing
            $nisn = $user->siswa->nisn;
            $tempat_lahir = $user->siswa->tempat_lahir;
            $tgl_lahir = $user->siswa->tgl_lahir;
            $jenis_kelamin = $user->siswa->jenis_kelamin;
            $agama = $user->siswa->agama;
            $kelas = $user->siswa->kelas;
            $nama_orangtua = $user->siswa->nama_orangtua;
            $no_hp_orangtua = $user->siswa->no_hp_orangtua;


        } elseif ($user->isGuruPembimbing()) {
            $alamat = $user->guru_pembimbing->alamat;
            $tempat_lahir = $user->guru_pembimbing->tempat_lahir;
            $tgl_lahir = $user->guru_pembimbing->tgl_lahir;
            $jenis_kelamin = $user->guru_pembimbing->jenis_kelamin;
            $agama = $user->guru_pembimbing->agama;
            $wali_kelas = $user->guru_pembimbing->wali_kelas;

        } else {
            // Jika pengguna tidak memiliki peran yang sesuai, mungkin Anda ingin menangani kasus ini dengan cara tertentu.
            abort(403, 'Unauthorized access');
        }

        // Sekarang, Anda memiliki data alamat yang sesuai dengan peran pengguna.

    return view('pages.profilepengguna', compact('alamat','guru_pembimbing_id', 'nama_guru_pembimbing', 'nisn','tempat_lahir','tgl_lahir', 'agama', 'jenis_kelamin','wali_kelas','kelas','nama_orangtua','no_hp_orangtua', 'gambar_profile'));
    }


    //update data
    public function updateProfile(Request $request)
    {
        // Dapatkan pengguna yang sedang diautentikasi
        $user = auth()->user();

        $validateForm = [
            // 'guru_pembimbing_id' => 'required|string|max:255',
            // 'nisn' => 'required|string|max:25',
            // 'name' => 'required|string|max:255',
            // 'alamat' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'tempat_lahir' => 'required|string|max:255',
            // 'tgl_lahir' => 'required|date',
            // 'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            // 'agama' => 'required|string|max:255',
            // 'wali_kelas' => 'required|string|max:255',
            // 'kelas' => 'required|string|max:255',
            // 'gambar_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // tambahkan aturan validasi untuk kolom lainnya yang ingin Anda perbarui
        ];

        if($user->isSiswa()){
            $validateForm["nama_orangtua"] = 'required|string|max:255';
            $validateForm["no_hp_orangtua"] = 'required|string|max:255';
            // $validateForm["guru_pembimbing_id"] = 'required|string|max:255';
            $validateForm["nisn"] = 'required|string|max:25';
            $validateForm["agama"] = 'required|string|max:255';
            $validateForm["kelas"] = 'required|string|max:255';
            $validateForm["gambar"] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }elseif($user->isGuruPembimbing()){
            $validateForm["agama"] = 'required|string|max:255';
            $validateForm["wali_kelas"] = 'required|string|max:255';

        }

        $request->validate($validateForm);

        // Perbarui data pengguna berdasarkan peran pengguna
        if ($request->hasFile('gambar_profile')) {
            // Ambil gambar yang diunggah
            $gambar = $request->file('gambar_profile');
            // Buat nama file baru
            $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
            // Simpan gambar baru ke dalam direktori 'dist/img/'
            $path = 'dist/img/' . $fileName;
            // Pindahkan file yang diunggah ke direktori tujuan
            $gambar->move(public_path('dist/img'), $fileName);
            // Update kolom gambar_profile di dalam database
            $user->gambar_profile = $fileName;
        }

        $data = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'gambar_profile' => $request->gambar_profile,
        ];

        // Update data pengguna sesuai peran
        if ($user->isAdmin()) {

            $user->admin->update($data);
        } elseif ($user->isSiswa()) {
            $data["nama_orangtua"] = $request->nama_orangtua;
            $data["agama"] = $request->agama;
            // $data["guru_pembimbing_id"] = $request->guru_pembimbing_id;
            $data["nisn"] = $request->nisn;
            $data["kelas"] = $request->kelas;
            $data["nama_orangtua"] = $request->nama_orangtua;
            $data["no_hp_orangtua"] = $request->no_hp_orangtua;

            $user->siswa->update($data);
        } elseif ($user->isGuruPembimbing()) {
            $data["wali_kelas"] = $request->wali_kelas;
            $data["agama"] = $request->agama;
            $user->guru_pembimbing->update($data);
        }

        // Redirect kembali ke halaman profil pengguna dengan pesan sukses
        return redirect()->route('profilepengguna')->with('success', 'Profil berhasil diperbarui.');
    }



}
