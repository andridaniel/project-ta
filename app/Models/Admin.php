<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'admins';

    public function User()
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
    ];
}
