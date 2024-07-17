<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'no_hp',
        'gambar_profile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }

    public function Admin(){
        return $this->hasOne(Admin::class, "user_id", "id");
    }

    public function Guru_Pembimbing(){
        return $this->hasOne(Guru_Pembimbing::class, "user_id", "id");
    }

    public function Siswa(){
        return $this->hasOne(Siswa::class, "user_id", "id");
    }

    // Metode untuk memeriksa apakah pengguna adalah admin
    public function isAdmin()
    {
        return $this->Admin()->exists();
    }

    // Metode untuk memeriksa apakah pengguna adalah siswa
    public function isSiswa()
    {
        return $this->Siswa()->exists();
    }

    // Metode untuk memeriksa apakah pengguna adalah guru pembimbing
    public function isGuruPembimbing()
    {
        return $this->Guru_Pembimbing()->exists();
    }

}
