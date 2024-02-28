<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTempatMagangController extends Controller
{
    public function index(){
        return view('pages.formtempatmagang');
    }
}
