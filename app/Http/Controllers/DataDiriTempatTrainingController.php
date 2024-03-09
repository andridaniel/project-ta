<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDiriTempatTrainingController extends Controller
{
    public function index()
    {
        return view('pages.datadiritempattraining');
    }
}
