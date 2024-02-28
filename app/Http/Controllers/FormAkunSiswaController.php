<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormAkunSiswaController extends Controller
{
    public function index()
    {
        return view('pages.pagesadmin.formakunsiswa');
    }
}
