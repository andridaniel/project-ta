<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use Illuminate\Http\Request;

class DetailTempatTrainingController extends Controller
{
    public function index(){
        $data_tempat_training = Tempat_Training::all();
        return view('pages.detailtempattraining', compact('data_tempat_training'));
    }
}
