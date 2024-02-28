<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailAkunSiswaController extends Controller
{
    public function index()
    {
        return view('pages.pagesadmin.detailakunsiswa');
    }
}
