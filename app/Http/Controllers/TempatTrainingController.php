<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TempatTrainingController extends Controller
{
    //
    public function index(){
        $data_tempat_training = Tempat_Training::all();
        return view('pages.tempattraining', compact('data_tempat_training'));
    }

    public function delete($id)
    {
        // Hapus produk berdasarkan ID menggunakan Query Builder
        DB::table('tempat_training')->where('id', $id)->delete();

        // Redirect kembali ke halaman tabel produk setelah penghapusan.
        return redirect()->route('tempattraining')->with('success', 'Data Berhasil di hapus');
    }


}
