<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hasil_Interview extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hasil_interview';

    protected $fillable = [
        'id_siswa',
        'id_tempat_training',
        'file_hasil_interview',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }



    public function tempatTraining()
    {
        return $this->belongsTo(Tempat_Training::class, 'id_tempat_training');
    }
}
