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
            $gambar_profile = $user->admin->gambar_profile;
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
            $gambar_profile = $user->siswa->gambar_profile;

        } elseif ($user->isGuruPembimbing()) {
            $alamat = $user->guru_pembimbing->alamat;
            $tempat_lahir = $user->guru_pembimbing->tempat_lahir;
            $tgl_lahir = $user->guru_pembimbing->tgl_lahir;
            $jenis_kelamin = $user->guru_pembimbing->jenis_kelamin;
            $agama = $user->guru_pembimbing->agama;
            $wali_kelas = $user->guru_pembimbing->wali_kelas;
            $gambar_profile = $user->guru_pembimbing->gambar_profile;
        } else {
            // Jika pengguna tidak memiliki peran yang sesuai, mungkin Anda ingin menangani kasus ini dengan cara tertentu.
            abort(403, 'Unauthorized access');
        }

        // Sekarang, Anda memiliki data alamat yang sesuai dengan peran pengguna.

    return view('pages.profilepengguna', compact('alamat','guru_pembimbing_id', 'nama_guru_pembimbing', 'nisn','tempat_lahir','tgl_lahir', 'agama', 'jenis_kelamin','wali_kelas','kelas','nama_orangtua','no_hp_orangtua', 'gambar_profile'));
    }


    //update data
    public function update(Request $request)
{
    // Mendapatkan pengguna yang sedang diautentikasi
    $user = auth()->user();

    // Validasi input yang diterima dari form
    $validatedData = $request->validate([
        // Atur aturan validasi sesuai dengan kebutuhan Anda
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'no_hp' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'agama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'gambar_profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // Lanjutkan dengan aturan validasi untuk atribut lainnya
    ]);

    // Memperbarui data sesuai peran pengguna
    if ($user->isAdmin()) {
        $user->admin->update($validatedData);
    }elseif ($user->isSiswa()) {
        // Pastikan user memiliki role siswa sebelum memperbarui data siswa
        if ($user->siswa) {
            // Lakukan validasi tambahan untuk guru_pembimbing_id sebelum pembaruan data siswa
            if ($request->has('guru_pembimbing_id')) {
                // Periksa apakah guru_pembimbing_id ada dalam basis data
                $guruPembimbingExists = Guru_Pembimbing::where('id', $request->guru_pembimbing_id)->exists();
                if (!$guruPembimbingExists) {
                    // Jika guru_pembimbing_id tidak valid, redirect dengan pesan kesalahan
                    return redirect()->back()->with('error', 'ID guru pembimbing tidak valid.');
                }
            }
            $user->siswa->update(array_merge($validatedData, [
                'guru_pembimbing_id' => $request->guru_pembimbing_id,
                'kelas' => $request->kelas,
                'nama_orangtua' => $request->nama_orangtua,
                'no_hp_orangtua' => $request->no_hp_orangtua,
            ]));
        } else {
            // Handle ketika user tidak memiliki role siswa
            abort(403, 'Unauthorized access');
        }
    }


    // Handle updating the image if provided
    if ($request->hasFile('gambar_profile')) {
        // Lakukan penanganan gambar seperti yang Anda lakukan sebelumnya
    }

    // Redirect atau melakukan operasi lainnya setelah update
    return redirect()->back()->with('success', 'Data berhasil diperbarui.');
}



}
