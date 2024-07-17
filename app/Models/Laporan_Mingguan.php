<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan_Mingguan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laporan_mingguan';

    protected $fillable = [
        'id_siswa',
        'id_tempat_training',
        'minggu',
        'laporan_mingguan',
        'status',
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
