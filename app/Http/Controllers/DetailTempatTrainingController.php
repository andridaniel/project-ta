<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use App\Models\Pilihan_Tempat_Training;
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

        // Mendapatkan id siswa yang sedang login
        $id_siswa = auth()->user()->siswa->id;

        // Memeriksa apakah siswa sudah mendaftar pada tempat training
        $is_siswa_registered = Pilihan_Tempat_Training::where('id_siswa', $id_siswa)
            ->whereIn('id_tempat_training', $data_tempat_training->pluck('id'))
            ->exists();

        return view('pages.detailtempattraining', compact('data_tempat_training', 'is_siswa_registered'));

    }

    public function dataShow($id){

        $data_tempat_training = Tempat_Training::findOrFail($id);

        if (!$data_tempat_training) {
            return redirect()->back()->with('error', 'Record not found');
        }



        return view('pages.datadiritempattraining', compact('data_tempat_training'));
    }
}
