<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanTrainingController extends Controller
{
    public function index()
    {
        return view('pages.kegiatan_training');
    }
}
