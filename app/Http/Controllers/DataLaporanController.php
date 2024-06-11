<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempat_Training;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Surat;
use App\Models\Pilihan_Tempat_Training;
use App\Models\Laporan_Mingguan;
use App\Models\Guru_Pembimbing;
use App\Models\Laporan_Akhir;
use App\Models\Hasil_Interview;
use App\Models\Surat_Pengantar_Siswa;
use App\models\Laporan_Monitoring;
class DataLaporanController extends Controller
{
    //laporan mingguan
    public function index ( Request $request )
    {
        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

        // Jika yang login adalah Guru Pembimbing
        if ($auth_login->Guru_Pembimbing) {
            // Ambil semua siswa yang berada di bawah bimbingan guru yang sedang login
            $id_siswa = $auth_login->Guru_Pembimbing->siswa->pluck('id');

           // Fetch all hasil interview associated with the students
            $hasilLaporan = Hasil_Interview::whereIn('id_siswa', $id_siswa)->where('keterangan', 'Diterima')
            ->with('siswa.user', 'tempatTraining')
            ->get();

            $hasilLaporanAkhir = Laporan_Akhir::whereIn('id_siswa', $id_siswa)
            ->with('siswa.user', 'tempatTraining')
            ->get();

            return view('pages.validasi_laporan', compact('hasilLaporan','hasilLaporanAkhir'));
        }

        // Jika yang login bukan Guru Pembimbing, atau tidak diizinkan
        return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
    }



    //validasi laporan akhir
    public function validasiLaporanAkhir(Request $request, $id_siswa, $id_tempat_training, $id)
    {
      // Validasi input
        $request->validate([
            'status' => 'required',
        ]);

        // Cari laporan yang akan di-update
        $laporan = Laporan_Akhir::findOrFail($id);

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

        return redirect()->route('validasi_laporan')->with('success', 'Laporan akhir berhasil divalidasi.');
    }





    //laporan Monitoring
    public function laporan_monitoring(Request $request)
    {
        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

        // Jika yang login adalah Guru Pembimbing
        if ($auth_login->Guru_Pembimbing) {
            // Ambil semua siswa yang berada di bawah bimbingan guru yang sedang login
            $id_siswa = $auth_login->Guru_Pembimbing->siswa->pluck('id');

           // Fetch all hasil interview associated with the students
            $laporanMonitoring = Hasil_Interview::whereIn('id_siswa', $id_siswa)->where('keterangan', 'Diterima')
            ->with('siswa.user', 'tempatTraining')
            ->get();


        return view('pages.data_laporan_monitoring', compact('laporanMonitoring'));
        }
    }





    //tambah data monitoring
    public function StoreLaporanMonitoring(Request $request, $id_siswa, $id_tempat_training)
    {

        $request->validate([
            'bulan' => 'required',
            'laporan_monitoring' => 'required',
        ]);

        $checkBulanIsExists = Laporan_Monitoring::where('id_siswa', $id_siswa)->where('bulan', $request->bulan)->exists();

        if($checkBulanIsExists){
            return redirect()->back()->with("error", "Mohon Maaf Laporan Dalam Bulan Ini Sudah Ada, Silahkan Cek Kembali");
        }

        $kegiatan_monitoring = Hasil_Interview::where('id_siswa', $id_siswa)->where('keterangan', 'Diterima')
            ->with('siswa.user','tempatTraining')
            ->get();


        if (!$kegiatan_monitoring) {
            return redirect()->route('kegiatan_training')->with('error', 'Training place not found.');
        }

        $kegiatan_monitoring = new Laporan_Monitoring();
        $kegiatan_monitoring->id_siswa = $id_siswa;
        $kegiatan_monitoring->id_tempat_training = $id_tempat_training;
        $kegiatan_monitoring->bulan = $request->bulan;
        $kegiatan_monitoring->laporan_monitoring = $request->laporan_monitoring;
        $kegiatan_monitoring->save();


        return redirect()->route('data_laporan_monitoring')->with('success', 'Laporan monitoring berhasil diupload.');

    }


    //detail laporan monitoring
    public function detailLaporanMonitoring(Request $request , $id_siswa)
    {
        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

        if ($auth_login->Guru_Pembimbing) {
            $siswa_ids = $auth_login->Guru_Pembimbing->siswa->pluck('id');

            if ($siswa_ids->contains($id_siswa)) {
                $data_laporan_monitoring = Laporan_Monitoring::where('id_siswa', $id_siswa)
                    ->with('siswa.user', 'tempatTraining')
                    ->get();

                return view('pages.detail_laporan_monitoring', compact('data_laporan_monitoring'));
            } else {
                return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
            }
        }

        return redirect()->route('data_laporan_monitoring')->with('error', 'Unauthorized access.');
    }



    //surat pengantar siswa
    public function SuratPengantarSiswa(Request $request, $id)
    {

        $data_surats = Surat::where('id_siswa', $id)->get();
        $siswas = Siswa::where('id',$id)->with(['user','hasPilihanTempatTraining'])->has('hasPilihanTempatTraining')->get();


        return view('pages.surat_pengantar_siswa', compact('siswas','data_surats'));


    }


}
