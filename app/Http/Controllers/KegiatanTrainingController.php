<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Training;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\Laporan_Mingguan;
use App\Models\Surat;
use App\Models\Pilihan_Tempat_Training;
use App\Models\Hasil_Interview;
use App\Models\Laporan_Akhir;
use Illuminate\Http\Request;

class KegiatanTrainingController extends Controller
{
    public function index(Request $request)
    {
        $id_siswa = $request->user()->Siswa->id;

        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');


        $laporan_akhir_siswa = Laporan_Akhir::where('id_siswa', $id_siswa)
            ->with('siswa.user','tempatTraining')
            ->get();

        $kegiatan_training = Hasil_Interview::where('id_siswa', $id_siswa)->where('keterangan', 'Diterima')
            ->with('siswa.user','tempatTraining')
            ->get();


        return view('pages.kegiatan_training', compact( 'kegiatan_training','laporan_akhir_siswa'));

    }

    // tambah data laporan mingguan siswa
    public function StoreLaporan(Request $request, $id_siswa, $id_tempat_training)
    {

        $request->validate([
            'minggu' => 'required',
            'laporan_mingguan' => 'required',
        ]);

        $checkMingguIsExists = Laporan_Mingguan::where('id_siswa', $id_siswa)->where('minggu', $request->minggu)->exists();

        if($checkMingguIsExists){
            return redirect()->back()->with("error", "Mohon Maaf Laporan Dalam Minggu Ini Sudah Ada, Silahkan Cek Kembali");
        }

        if ($request->user()->Siswa->id != $id_siswa) {
            return redirect()->route('kegiatan_training')->with('error', 'Unauthorized access.');
        }

        $kegiatan_training = Hasil_Interview::where('id_siswa', $id_siswa)->where('keterangan', 'Diterima')
            ->with('siswa.user','tempatTraining')
            ->get();


        if (!$kegiatan_training) {
            return redirect()->route('kegiatan_training')->with('error', 'Training place not found.');
        }

        $kegiatan_training = new Laporan_Mingguan();
        $kegiatan_training->id_siswa = $id_siswa;
        $kegiatan_training->id_tempat_training = $id_tempat_training;
        $kegiatan_training->minggu = $request->minggu;
        $kegiatan_training->laporan_mingguan = $request->laporan_mingguan;
        // $kegiatan_training->status = $request->status;
        $kegiatan_training->save();


        return redirect()->route('kegiatan_training')->with('success', 'Laporan mingguan berhasil diupload.');

    }


    //show data laporan mingguan siswa
    public function detailLaporanMingguan(Request $request)
    {
        $id_siswa = $request->user()->Siswa->id;

        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

        $laporan_mingguan_siswa = Laporan_Mingguan::where('id_siswa', $id_siswa)
            ->with('siswa.user','tempatTraining')
            ->get();


        return view('pages.detail_laporan_mingguan', compact( 'laporan_mingguan_siswa'));
    }



    //udpate data laporan mingguan siswa
     public function UpdateLaporanMingguan(Request $request, $id_siswa, $id_tempat_training, $id)
     {
       // Validasi input
         $request->validate([
             'laporan_mingguan' => 'required',
         ]);

         // Cari laporan yang akan di-update
         $laporan = Laporan_Mingguan::findOrFail($id);

         // Cek apakah siswa diterima di tempat training
         $kegiatan_training = Hasil_Interview::where('id_siswa', $laporan->id_siswa)
             ->where('keterangan', 'Diterima')
             ->first();

         if (!$kegiatan_training) {
             return redirect()->route('kegiatan_training')->with('error', 'Training place not found.');
         }

         // Update laporan
         $laporan->laporan_mingguan = $request->laporan_mingguan;
         $laporan->save();

         return redirect()->route('detail_laporan_mingguan')->with('success', 'Laporan mingguan berhasil diupdate.');
     }

    //data laporan siswa
    public function laporanSiswa(Request $request, $id_siswa)
    {
        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

        // Jika yang login adalah Guru Pembimbing
        if ($auth_login->Guru_Pembimbing) {
            // Ambil semua siswa yang berada di bawah bimbingan guru yang sedang login
            $siswa_ids = $auth_login->Guru_Pembimbing->siswa->pluck('id');

            // Periksa apakah siswa yang diminta ada dalam daftar bimbingan guru
            if ($siswa_ids->contains($id_siswa)) {
                // Fetch hasil interview associated with the specific student
                $data_laporan_siswa = Laporan_Mingguan::where('id_siswa', $id_siswa)
                    ->with('siswa.user', 'tempatTraining')
                    ->get();

                return view('pages.laporan_siswa', compact('data_laporan_siswa'));
            } else {
                // Jika siswa tidak dalam daftar bimbingan guru
                return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
            }
        }

        // Jika yang login bukan Guru Pembimbing, atau tidak diizinkan
        return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
    }





    //validasi laporan mingguan siswa
    public function validasiLaporanMingguan(Request $request, $id_siswa, $id_tempat_training, $id)
    {
      // Validasi input
        $request->validate([
            'status' => 'required',
        ]);

        // Cari laporan yang akan di-update
        $laporan = Laporan_Mingguan::findOrFail($id);

        // Cek apakah siswa diterima di tempat training
        $kegiatan_training = Hasil_Interview::where('id_siswa', $laporan->id_siswa)
            ->where('keterangan', 'Diterima')
            ->first();

        if (!$kegiatan_training) {
            return redirect()->route('kegiatan_training')->with('error', 'Training place not found.');
        }

        // Update laporan
        $laporan->status = $request->status;
        $laporan->save();

        return redirect()->back()->with('success', 'Validasi laporan mingguan berhasil diupdate.');
    }



    //tambah data Laporan akhir  siswa (untuksiswa)
    public function TambahLaporanAkhir(Request $request, $id_siswa, $id_tempat_training)
    {
        // Validasi input
        $request->validate([
            'file_laporan_akhir' => 'required|mimes:pdf|max:2048',
        ]);

        // Temukan kegiatan training berdasarkan id_siswa dan id_tempat_training
        $kegiatan_training = Hasil_Interview::where('id_siswa', $id_siswa)
            ->where('keterangan', 'Diterima')
            ->with('siswa.user', 'tempatTraining')
            ->first();

        if (!$kegiatan_training) {
            return redirect()->route('kegiatan_training')->with('error', 'Training place not found.');
        }

        $checkMingguIsExists = Laporan_Akhir::where('id_siswa', $id_siswa)->where('id_tempat_training', $request->id_tempat_training)->exists();

        if($checkMingguIsExists){
            return redirect()->back()->with("error", "Mohon Maaf Anda Sudah Upload Laporan Akhir, Silahkan Cek Kembali");
        }

        try {
            $fileName = null;
            // Handle the uploaded file if there is one
            if ($request->hasFile('file_laporan_akhir')) {
                $file_laporan_akhir = $request->file('file_laporan_akhir');
                $fileName = date('Y.m.d') . '_' . $file_laporan_akhir->getClientOriginalName();
                $file_laporan_akhir->move(public_path('dist/laporan_akhir'), $fileName);
            }

            // Buat instance baru dari model Laporan_Akhir
            $laporan_akhir = new Laporan_Akhir();
            $laporan_akhir->id_siswa = $id_siswa;
            $laporan_akhir->id_tempat_training = $id_tempat_training;
            $laporan_akhir->file_laporan_akhir = $fileName;
            $laporan_akhir->save();

            return redirect()->route('kegiatan_training')->with('success', 'laporan akhir berhasil di tambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('kegiatan_training')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    //tampilkan data Laporan akhir  siswa (untuksiswa)
    // public function TampilkanLaporanAkhir(Request $request)
    // {
    //     $id_siswa = $request->user()->Siswa->id;

    //     $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

    //     $laporan_akhir_siswa = Laporan_Akhir::where('id_siswa', $id_siswa)
    //         ->with('siswa.user','tempatTraining')
    //         ->get();


    //     return view('pages.kegiatan_training', compact( 'laporan_akhir_siswa'));
    // }





}
