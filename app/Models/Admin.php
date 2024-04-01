<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'user_id',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'gambar_profile',
    ];
}
