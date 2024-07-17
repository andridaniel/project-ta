<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat_pengantar';

    protected $fillable = [
        'id_siswa',
        'id_pilihan_tempat_training',
        'file_surat_pengantar',
    ];



    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function tempatTraining()
    {
        return $this->belongsTo(Tempat_Training::class, 'id_pilihan_tempat_training');
    }

}
