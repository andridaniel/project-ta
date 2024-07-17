<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat_Kerapian extends Model
{
    use HasFactory, SoftDeletes;

    protected  $table = 'surat_kerapian';



    protected $fillable = [
        'id_siswa',
        'file_surat_kerapian',
    ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }



}
