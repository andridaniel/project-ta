<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataLaporanController extends Controller
{
    //laporan mingguan
    public function index ()
    {
        return view('pages.data_laporan_mingguan');
    }


    //laporan akhir

    public function laporan_akhir()
    {
        return view('pages.data_laporan_akhir');
    }
}
