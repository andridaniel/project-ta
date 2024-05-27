<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat_Training extends Model
{
    use HasFactory;

    protected $table = 'tempat_training';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'nama_tempat_training',
        'alamat_tempat_training',
        'telepon_tempat_training',
        'email_tempat_training',
        'lowongan_training',
        'ketentuan_tambahan_training', // corrected property name
        'jadwal_interview',
        'waktu_interview',
        'gambar',
    ];

    public function pilihanTempatTrainings()
    {
        return $this->hasMany(Pilihan_Tempat_Training::class, 'id_tempat_Training');
    }
}
