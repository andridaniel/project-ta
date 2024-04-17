<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\User;

class DataSiswaBimbinganController extends Controller
{
    public function index(Request $request){
        // Mendapatkan ID guru pembimbing yang sedang login
        $guru_pembimbing_id = $request->user()->load("Guru_Pembimbing")->Guru_Pembimbing->id;

        // Memuat semua siswa yang terkait dengan guru pembimbing saat ini
        $siswa = Siswa::where('guru_pembimbing_id', $guru_pembimbing_id)->get();

        // Kemudian Anda bisa melewatkan data siswa ke view untuk ditampilkan
        return view ('pages.data_siswa_bimbingan', compact('siswa'));
    }

    public function show($id){
        $guru_pembimbing = User::where('role_id', 2)->get();
        $siswa_bimbingan = Siswa::with(["user","hasGuruPembimbing"])->where("id", $id)->first();

        return view('pages.detail_siswa_bimbingan', compact('siswa_bimbingan','guru_pembimbing'));
    }


    public function kelompok_bimbingan(Request $request){
    // Mendapatkan ID Guru Pembimbing dari siswa yang sedang login
     $guru_pembimbing_id = $request->user()->load("Siswa")->Siswa->guru_pembimbing_id;

    //  // Memuat semua siswa yang memiliki guru pembimbing dengan ID yang sama
     $kelompok_bimbingan = Siswa::where('guru_pembimbing_id', $guru_pembimbing_id)->get();

     return view('pages.kelompok_bimbingan', compact('kelompok_bimbingan'));

    }


}
