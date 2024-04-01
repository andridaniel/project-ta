<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfilePenggunaController extends Controller
{
    public function index(){
        $data_pengguna = User::all();
        return view('pages.profilepengguna', compact('data_pengguna'));
    }

    public function show($id)
    {
        // Mencari data pengguna berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Memeriksa peran pengguna
        if ($user->role === 'siswa') {
            // Jika peran pengguna adalah siswa, ambil data profil dari tabel siswa
            $profile = Siswa::where('user_id', $id)->first();
        } elseif ($user->role === 'guru_pembimbing') {
            // Jika peran pengguna adalah guru pembimbing, ambil data profil dari tabel guru_pembimbing
            $profile = GuruPembimbing::where('user_id', $id)->first();
        } else {
            // Jika peran pengguna tidak sesuai, kembalikan dengan pesan kesalahan
            return redirect()->back()->with('error', 'Invalid role');
        }

        // Mengirim data profil ke tampilan untuk ditampilkan
        return view('pages.profilepengguna', compact('profile'));
    }

}
