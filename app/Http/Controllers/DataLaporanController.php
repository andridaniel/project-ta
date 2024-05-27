<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempat_Training;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Surat;
use App\Models\Pilihan_Tempat_Training;

class DataLaporanController extends Controller
{
    //laporan mingguan
    public function index ()
    {
        return view('pages.validasi_laporan');
    }


    //laporan akhir

    public function laporan_akhir()
    {
        return view('pages.data_laporan_akhir');
    }

    //laporan Monitoring

    public function laporan_monitoring()
    {
        return view('pages.data_laporan_monitoring');
    }








    //surat pengantar siswa
    public function SuratPengantarSiswa($id)
    {
        $surats = Surat::all();
        $siswas = Siswa::where('id',$id)->with(['user','hasPilihanTempatTraining'])->has('hasPilihanTempatTraining')->first();
        return view('pages.surat_pengantar_siswa', compact('siswas','surats'));
    }


}
