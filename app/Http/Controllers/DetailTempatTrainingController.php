<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use App\Models\Pilihan_Tempat_Training;
use App\Models\Admin;
use App\Models\Guru_Pembimbing;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailTempatTrainingController extends Controller
{
    public function index(){
        return view('pages.detailtempattraining');
    }


    public function show($id)
    {
        // Dapatkan data tempat training atau gagal jika tidak ditemukan
        $data_tempat_training = Tempat_Training::findOrFail($id);

        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();
        $id_siswa = null;
        $is_siswa_registered = false;

        // Memeriksa peran pengguna
        if ($user->Role('siswa')) {
            // Jika pengguna adalah siswa, dapatkan id siswa
            $siswa = $user->load('Siswa')->siswa;
            if ($siswa) {
                $id_siswa = $siswa->id;
            }

            // Memeriksa apakah siswa sudah mendaftar pada tempat training
            if ($id_siswa) {
                $getTempatTrainingSiswa = Pilihan_Tempat_Training::where('id_siswa', $id_siswa)
                ->where('id_tempat_training', $data_tempat_training->id);

                $is_siswa_registered = $getTempatTrainingSiswa->exists();
                $is_max_registered_tempat_training = Pilihan_Tempat_Training::where('id_siswa', $id_siswa)->count() >= 3;
            }
        }

        return view('pages.detailtempattraining', compact('data_tempat_training', 'is_siswa_registered', 'is_max_registered_tempat_training'));
    }



    public function dataShow($id){

        $data_tempat_training = Tempat_Training::findOrFail($id);

        if (!$data_tempat_training) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.datadiritempattraining', compact('data_tempat_training'));


    }

    public function informasiTempatTraining(  $id){
        $data_tempat_training = Tempat_Training::findOrFail($id);

        return view('pages.detailPilihanTempatTraining', compact('data_tempat_training'));

    }


    public function showPilihanTempatTraining(  $id){

        $data_tempat_training = Tempat_Training::findOrFail($id);

        if (!$data_tempat_training) {
            return redirect()->back()->with('error', 'Record not found');
        }

        // Mendapatkan id siswa yang sedang login
        $id_siswa = auth()->user()->load("Siswa")->siswa->id;


        // Memeriksa apakah siswa sudah mendaftar pada tempat training
        $is_siswa_registered = Pilihan_Tempat_Training::where('id_siswa', $id_siswa)
            ->where('id_tempat_Training', $data_tempat_training->id)
            ->exists();

        return view('pages.detailPilihanTempatTraining', compact('data_tempat_training', 'is_siswa_registered'));

    }
}
