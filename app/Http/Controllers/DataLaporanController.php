<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
