<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempat_Training;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;

use App\Models\Surat;
use App\Models\Pilihan_Tempat_Training;
use App\Models\Hasil_Interview;


class InterviewController extends Controller
{
    //jadwal interview
    public function jadwal_interview(Request $request)
{
    $id_siswa = $request->user()->Siswa->id;

    $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

    $pilihan_tempat_training = Pilihan_Tempat_Training::where('id_siswa', $id_siswa)
        ->with('tempatTraining')
        ->get();

    $hasilInterviews = Hasil_Interview::where('id_siswa', $auth_login->Siswa->id)->get();



    return view('pages.jadwal_interview', compact('pilihan_tempat_training', 'hasilInterviews'));
}

public function StoreInterview(Request $request, $id_siswa, $id_tempat_training)
{
    $request->validate([
        'file_hasil_interview' => 'required|mimes:pdf|max:2048',
        'keterangan' => 'required',
    ]);

    if ($request->user()->Siswa->id != $id_siswa) {
        return redirect()->route('jadwal_interview')->with('error', 'Unauthorized access.');
    }

    $pilihan_tempat_training = Pilihan_Tempat_Training::where('id_tempat_Training', $id_tempat_training)
        ->where('id_siswa', $id_siswa)
        ->first();

    $checkMingguIsExists = hasil_interview::where('id_siswa', $id_siswa)->where('id_tempat_training', $request->id_tempat_training)->exists();

    if($checkMingguIsExists){
            return redirect()->back()->with("error", "Mohon Maaf Anda Sudah Upload Laporan Hasil Interview, Hanya Diperbolehkan Mengupload 1 kali");
        }

    if (!$pilihan_tempat_training) {
        return redirect()->route('jadwal_interview')->with('error', 'Training place not found.');
    }

    try {
        // Handle the uploaded file
        $file_hasil_interview = $request->file('file_hasil_interview');
        $fileName = date('Y.m.d') . '_' . $file_hasil_interview->getClientOriginalName();
        $file_hasil_interview->move(public_path('dist/interview'), $fileName);

        // Save the interview data to the database
        $interview = new Hasil_Interview();
        $interview->id_siswa = $id_siswa;
        $interview->id_tempat_training = $id_tempat_training;
        $interview->file_hasil_interview = $fileName;
        $interview->keterangan = $request->input('keterangan');
        $interview->save();

        return redirect()->route('jadwal_interview')->with('success', 'Data interview berhasil ditambahkan.');
    } catch (\Exception $e) {
        return redirect()->route('jadwal_interview')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}



    //update data hasil interview
    public function hasil_interview(Request $request)
    {

        $auth_login = $request->user()->load('Guru_Pembimbing', 'Siswa');

        // Jika yang login adalah Guru Pembimbing
        if ($auth_login->Guru_Pembimbing) {
            // Ambil semua siswa yang berada di bawah bimbingan guru yang sedang login
            $siswa_ids = $auth_login->Guru_Pembimbing->siswa->pluck('id');

           // Fetch all hasil interview associated with the students
            $hasilInterviews = Hasil_Interview::whereIn('id_siswa', $siswa_ids)
            ->with('siswa.user', 'tempatTraining')
            ->get();


            return view('pages.hasil_interview', compact('hasilInterviews'));
        }

        // Jika yang login bukan Guru Pembimbing, atau tidak diizinkan
        return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
    }

    public function updateInterview(Request $request, $id_siswa, $id_tempat_training, $id)
    {
        // Validate the incoming request
        $request->validate([
            'file_hasil_interview' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'keterangan' => 'required',
        ]);

        // Retrieve the training place associated with the student
        $pilihan_tempat_training = Pilihan_Tempat_Training::where('id_tempat_Training', $id_tempat_training)
            ->where('id_siswa', $id_siswa)
            ->first();


        if (!$pilihan_tempat_training) {
            return redirect()->back()->with('error', 'Training place not found.');
        }

        // Retrieve the interview data
        $interview = Hasil_Interview::where('id', $id)
            ->where('id_siswa', $id_siswa)
            ->where('id_tempat_training', $id_tempat_training)
            ->first();

        if (!$interview) {
            return redirect()->route('hasil_interview')->with('error', 'Interview data not found.');
        }

        try {
            // Handle the uploaded file if there is one
            if ($request->hasFile('file_hasil_interview')) {
                // Delete the old file if it exists
                if ($interview->file_hasil_interview && file_exists(public_path('dist/interview/' . $interview->file_hasil_interview))) {
                    unlink(public_path('dist/interview/' . $interview->file_hasil_interview));
                }

                $file_hasil_interview = $request->file('file_hasil_interview');
                $fileName = date('Y.m.d') . '_' . $file_hasil_interview->getClientOriginalName();
                $file_hasil_interview->move(public_path('dist/interview'), $fileName);

                // Update file name in the database
                $interview->file_hasil_interview = $fileName;
            }

            // Update other interview data
            $interview->keterangan = $request->keterangan;
            $interview->save();

            return redirect()->route('hasil_interview')->with('success', 'Data interview berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('hasil_interview')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    public function deleteHasilInterview(Hasil_interview $hasil_interview)
    {
        try {
            // Hapus file surat dari sistem penyimpanan
            $filePath = public_path('dist/interview/') . $hasil_interview->file_hasil_interview;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data surat dari database
            $hasil_interview->delete();

            return redirect()->back()->with('success', 'Surat berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus surat.');
        }
    }




}
