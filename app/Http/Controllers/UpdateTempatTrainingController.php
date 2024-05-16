<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UpdateTempatTrainingController extends Controller
{
    public function index(){
        $update_tempat_training = Tempat_Training::all();
        return view('pages.updatetempattraining', compact('update_tempat_training'));
    }


    public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'nama_tempat_training' => 'required',
                'alamat_tempat_training' => 'required',
                'telepon_tempat_training' => 'required',
                'email_tempat_training' => 'required|email',
                'lowongan_training' => 'required',
                'jumlah_lowongan_training' => 'required|numeric',
                'ketentuan_tambahan_training' => 'required',
                'jadwal_interview' => 'required',
                'waktu_interview' => 'required',
                'gambar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $update_tempat_training = Tempat_Training::find($id);

            if (!$update_tempat_training) {
                // Handle the case where the record is not found
                return redirect()->back()->with('error', 'Record not found');
            }

            // Hapus gambar sebelumnya jika ada perubahan
            if ($request->hasFile('gambar')) {
                $path = 'dist/img/' . $update_tempat_training->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Update gambar jika ada perubahan gambar
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
                $path = 'dist/img/' . $fileName;
                $gambar->move('dist/img/', $fileName); // Pindahkan file gambar yang diunggah ke direktori yang ditentukan
                $update_tempat_training['gambar'] = $fileName; // Simpan nama file ke dalam kolom gambar di basis data
            }

            // Update data lainnya
            $update_tempat_training->nama_tempat_training = $request->nama_tempat_training;
            $update_tempat_training->alamat_tempat_training = $request->alamat_tempat_training;
            $update_tempat_training->telepon_tempat_training = $request->telepon_tempat_training;
            $update_tempat_training->email_tempat_training = $request->email_tempat_training;
            $update_tempat_training->lowongan_training = $request->lowongan_training;
            $update_tempat_training->jumlah_lowongan_training = $request->jumlah_lowongan_training;
            $update_tempat_training->ketentuan_tambahan_training = $request->ketentuan_tambahan_training;
            $update_tempat_training->jadwal_interview = $request->jadwal_interview;
            $update_tempat_training->waktu_interview = $request->waktu_interview;


            // Simpan perubahan
            $update_tempat_training->save();

            return redirect()->route('tempattraining')->with('success', 'Data tempat training berhasil diperbarui');


        }

        public function edit($id)
        {
            $update_tempat_training = Tempat_Training::find($id);

            if (!$update_tempat_training) {
                return redirect()->back()->with('error', 'Record not found');
            }

            return view('pages.updatetempattraining', compact('update_tempat_training'));
        }


}
