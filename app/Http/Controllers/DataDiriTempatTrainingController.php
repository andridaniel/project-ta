<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilihan_Tempat_Training;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\Tempat_Training;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DataDiriTempatTrainingController extends Controller
{
    public function index()
    {
        // $data_tempat_training = Tempat_Training::findOrFail($id);

        // if (!$data_tempat_training) {
        //     return redirect()->back()->with('error', 'Record not found');
        // }



        // return view('pages.datadiritempattraining', compact('data_tempat_training'));
        return view('pages.datadiritempattraining');
    }

    public function simpanPilihanTempat(Request $request)
    {
        // Validasi input jika diperlukan

        // Ambil ID siswa dari autentikasi atau sesi
        $id_siswa = auth()->user()->load("Siswa")->Siswa->id;

        // Ambil ID tempat training dari data yang dikirimkan melalui formulir
        $id_tempat_Training = $request->input('id_tempat_Training');

        // Simpan data ke dalam tabel pilihan_tempat_trainings
        Pilihan_Tempat_Training::create([
            'id_siswa' => $id_siswa,
            'id_tempat_Training' => $id_tempat_Training
        ]);

        // Redirect atau berikan respon sesuai kebutuhan
        return redirect()->route('tempattraining')->with('success', 'Pilihan tempat training berhasil disimpan!');
    }


    //untuk data diri tempat training
    public function dataDiri($id){
        // Mendapatkan pengguna yang sedang diautentikasi
        $user = auth()->user();

        $tempat_training = Tempat_Training::FindorFail($id);

        // Mendefinisikan variabel yang akan digunakan
        $alamat = $nisn = $tempat_lahir = $tgl_lahir = $agama = $jenis_kelamin = $kelas = $nama_orangtua = $no_hp_orangtua = $gambar_profile = null;

        // Mendapatkan data siswa
        if ($user->isSiswa()) {
            $alamat = $user->siswa->alamat;
            $guru_pembimbing_id = $user->siswa->guru_pembimbing_id;
            $nisn = $user->siswa->nisn;
            $tempat_lahir = $user->siswa->tempat_lahir;
            $tgl_lahir = $user->siswa->tgl_lahir;
            $jenis_kelamin = $user->siswa->jenis_kelamin;
            $agama = $user->siswa->agama;
            $kelas = $user->siswa->kelas;
            $nama_orangtua = $user->siswa->nama_orangtua;
            $no_hp_orangtua = $user->siswa->no_hp_orangtua;
            $gambar_profile = $user->siswa->gambar_profile;
        } else {
            // Jika pengguna tidak memiliki peran siswa, mungkin Anda ingin menangani kasus ini dengan cara tertentu.
            abort(403, 'Unauthorized access');
        }

        // Sekarang, Anda memiliki data siswa dari pengguna yang memiliki peran siswa.

        return view('pages.datadiritempattraining', compact('alamat', 'guru_pembimbing_id',  'nisn', 'tempat_lahir', 'tgl_lahir', 'agama', 'jenis_kelamin', 'kelas', 'nama_orangtua', 'no_hp_orangtua', 'gambar_profile', 'tempat_training'));
    }
}
