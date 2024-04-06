<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilihan_Tempat_Training;
use App\Models\Tempat_Training;


class DataDiriTempatTrainingController extends Controller
{
    public function index()
    {
        return view('pages.datadiritempattraining');
    }

    public function simpanPilihanTempat(Request $request)
{
    // Validasi input jika diperlukan

    // Ambil ID siswa dari autentikasi atau sesi
    $id_siswa = auth()->user()->id;

    // Ambil ID tempat training dari data yang dikirimkan melalui formulir
    $id_tempat_Training = $request->input('id_tempat_Training');

    // Simpan data ke dalam tabel pilihan_tempat_trainings
    Pilihan_Tempat_Training::create([
        'id_siswa' => $id_siswa,
        'id_tempat_Training' => $id_tempat_Training
    ]);

    // Redirect atau berikan respon sesuai kebutuhan
    return redirect()->route('tempattraining')->with('success', 'Pilihan tempat training berhasil disimpan!');
}
}
