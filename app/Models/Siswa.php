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

    public function hasGuruPembimbing(){
        return $this->belongsTo(Guru_Pembimbing::class, 'guru_pembimbing_id');
    }

    public function hasPilihanTempatTraining(){
        return $this->belongsToMany(Tempat_Training::class, 'pilihan_tempat_trainings', 'id_siswa', 'id_tempat_Training');
    }

    protected $fillable = [
        'user_id',
        'guru_pembimbing_id',
        'nisn',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'kelas',
        'nama_orangtua',
        'no_hp_orangtua',
    ];

}
