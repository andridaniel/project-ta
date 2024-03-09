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
        'nama_hotel',
        'alamat_hotel',
        'telepon_hotel',
        'email_hotel',
        'lowongan_training',
        'jumlah_lowongan_training',
        'ketentuan_tambahan_training', // corrected property name
        'gambar',
    ];
}
