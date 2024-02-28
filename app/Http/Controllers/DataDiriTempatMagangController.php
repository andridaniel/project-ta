<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDiriTempatMagangController extends Controller
{
    public function index()
    {
        return view('pages.datadiritempatmagang');
    }
}
