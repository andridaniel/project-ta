<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan_Monitoring extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laporan_monitoring';

    protected $fillable = [
        'id_siswa',
        'id_tempat_training',
        'bulan',
        'laporan_monitoring',
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
