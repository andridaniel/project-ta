<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailAkunGuruController extends Controller
{
    public function index()
    {
        return view('pages.pagesadmin.detailakunguru');
    }
}
