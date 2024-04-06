<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
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
         $alamat = $nisn = $tempat_lahir = $tgl_lahir = $agama = $jenis_kelamin = $wali_kelas = $kelas = $nama_orangtua = $no_hp_orangtua = $gambar_profile = null;

        // Mendapatkan data alamat sesuai peran pengguna
        if ($user->isAdmin()) {
            $alamat = $user->admin->alamat;
            $agama = $user->admin->agama;
            $jenis_kelamin = $user->admin->jenis_kelamin;
            $gambar_profile = $user->admin->gambar_profile;
        } elseif ($user->isSiswa()) {
            $alamat = $user->siswa->alamat;
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

    return view('pages.profilepengguna', compact('alamat','nisn','tempat_lahir','tgl_lahir', 'agama', 'jenis_kelamin','wali_kelas','kelas','nama_orangtua','no_hp_orangtua', 'gambar_profile'));
    }


    public function gambarSidebar()
    {
        // Mendapatkan pengguna yang sedang diautentikasi
        $user = auth()->user();

        // Mendapatkan gambar profil sesuai peran pengguna
        $gambar_profile = null;

        if ($user->isAdmin()) {
            $gambar_profile = $user->admin->gambar_profile;
        } elseif ($user->isSiswa()) {
            $gambar_profile = $user->siswa->gambar_profile;
        } elseif ($user->isGuruPembimbing()) {
            $gambar_profile = $user->guru_pembimbing->gambar_profile;
        } else {
            // Jika pengguna tidak memiliki peran yang sesuai, tampilkan pesan error
            abort(403, 'Unauthorized access');
        }

        // Sekarang, Anda memiliki data gambar_profile yang sesuai dengan peran pengguna.

        // Meneruskan variabel gambar_profile ke tampilan 'layouts.sidebar'
        return view('layouts.sidebar', compact('gambar_profile'));
    }



    //untuk data diri tempat training
    public function dataDiri(){
        // Mendapatkan pengguna yang sedang diautentikasi
        $user = auth()->user();

        // Mendefinisikan variabel yang akan digunakan
        $alamat = $nisn = $tempat_lahir = $tgl_lahir = $agama = $jenis_kelamin = $kelas = $nama_orangtua = $no_hp_orangtua = $gambar_profile = null;

        // Mendapatkan data siswa
        if ($user->isSiswa()) {
            $alamat = $user->siswa->alamat;
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

        return view('pages.datadiritempattraining', compact('alamat', 'nisn', 'tempat_lahir', 'tgl_lahir', 'agama', 'jenis_kelamin', 'kelas', 'nama_orangtua', 'no_hp_orangtua', 'gambar_profile'));
    }





}
