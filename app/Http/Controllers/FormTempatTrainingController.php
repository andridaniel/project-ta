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

        $validator = Validator::make($request->all(), [
            'nama_hotel' => 'required',
            'alamat_hotel' => 'required',
            'telepon_hotel' => 'required',
            'email_hotel' => 'required|email',
            'lowongan_training' => 'required',
            'jumlah_lowongan_training' => 'required|numeric',
            'ketentuan_tambahan_training' => 'required',
            // 'gambar' => 'image',
            'gambar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        if($validator->fails()){
            // dd($validator);
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

        Tempat_Training::create($validated_input);

        return redirect()->back();
    }



}
