<?php

namespace App\Http\Controllers;
use App\Models\Tempat_Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;


class FormTempatTrainingController extends Controller
{



    public function index(){
        return view('pages.formtempattraining');
    }



    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_tempat_training' => 'required',
            'alamat_tempat_training' => 'required',
            'telepon_tempat_training' => 'required',
            'email_tempat_training' => 'required|email',
            'lowongan_training' => 'required',
            'ketentuan_tambahan_training' => 'required',
            'jadwal_interview' => 'required',
            'waktu_interview' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        //upload gambar
        $gambar = $request->file('gambar');
        $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
        $path = 'dist/img/' . $fileName;

        file_put_contents($path, file_get_contents($gambar));

        $validated_input = $validator->validated();

        // Menyimpan user_id
        $validated_input['user_id'] = auth()->user()->id;

        $validated_input['gambar'] = $fileName;

        // Check apakah email sudah ada atau belum
        $existingEmail = Tempat_Training::where('email_tempat_training', $validated_input['email_tempat_training'])->first();
        if ($existingEmail) {
            // Email sudah ada, berikan pesan kesalahan
            return redirect()->back()->withErrors(['email_tempat_training' => 'Email already exists.']);
        }

        // Email belum ada, lanjutkan proses penyimpanan data
        Tempat_Training::create($validated_input);

        // Arahkan pengguna ke halaman tempattraining.blade.php
        return redirect()->route('tempattraining')->with('success', 'Data tempat training berhasil ditambahkan.');
    }




}
