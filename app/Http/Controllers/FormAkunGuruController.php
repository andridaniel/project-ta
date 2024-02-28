<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormAkunGuruController extends Controller
{
    public function index()
    {
        return view('pages.pagesadmin.formakunguru');
    }
}
