<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru_Pembimbing extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'guru_pembimbings';

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function surat_kerapian()
    {
        return $this->hasMany(Surat_Kerapian::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'guru_pembimbing_id');
    }

    protected $fillable = [
        'user_id',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'wali_kelas',
    ];
}
