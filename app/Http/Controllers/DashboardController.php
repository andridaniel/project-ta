<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $jumlah_siswa = 0;

        // if ($request->user()->role->nama === 'siswa') {
        //     if ($request->user()->siswa && $request->user()->siswa->guru_pembimbing_id) {
        //         $guru_pembimbing_id = $request->user()->siswa->guru_pembimbing_id;
        //         $jumlah_siswa = Siswa::where('guru_pembimbing_id', $guru_pembimbing_id)->count();
        //     }
        // } elseif ($request->user()->role->nama === 'guru pembimbing' || $request->user()->role->nama === 'admin') {
        //     $jumlah_siswa = Siswa::count();
        // }



        return view('pages.dashboard');
    }

}
