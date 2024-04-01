<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'nisn',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'kelas',
        'nama_orangtua',
        'no_hp_orangtua',
        'gambar_profile',
    ];
}
