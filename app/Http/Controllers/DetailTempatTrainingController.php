<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailTempatTrainingController extends Controller
{
    public function index(){
        return view('pages.detailtempattraining');
    }
    public function show($id){

        $data_tempat_training = Tempat_Training::findOrFail($id);

        if (!$data_tempat_training) {
            return redirect()->back()->with('error', 'Record not found');
        }



        return view('pages.detailtempattraining', compact('data_tempat_training'));
    }

    public function dataShow($id){

        $data_tempat_training = Tempat_Training::findOrFail($id);

        if (!$data_tempat_training) {
            return redirect()->back()->with('error', 'Record not found');
        }



        return view('pages.datadiritempattraining', compact('data_tempat_training'));
    }
}
