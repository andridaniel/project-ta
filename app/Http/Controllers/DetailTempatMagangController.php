<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailTempatMagangController extends Controller
{
    public function index(){
        return view('pages.detailtempatmagang');
    }
}
