<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pilihan_Tempat_Training extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'pilihan_tempat_trainings'; // Nama tabel dalam basis data

    protected $fillable = ['id_siswa', 'id_tempat_Training']; // Kolom yang dapat diisi secara massal

    // Jika Anda memiliki aturan validasi tambahan atau hubungan dengan model lain, Anda dapat menentukannya di sini
    public function tempatTraining()
    {
        return $this->belongsTo(Tempat_Training::class, 'id_tempat_Training');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
}
