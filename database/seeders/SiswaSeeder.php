<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;
use Database\Factories\UserFactory; // Import UserFactory from Database\Factories namespace
use Illuminate\Support\Facades\Schema;


Schema::disableForeignKeyConstraints();
class SiswaSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'role_id' => '3',
                'name' => 'siswa' . $i,
                'email' => 'siswa' . $i . '@gmail.com',
                'no_hp' => '0812356778' . $i,
                'gambar_profile' => 'default.png',
                'password' => Hash::make('12345678'),
            ]);

            Siswa::create([
                'user_id' => $user->id,
                'guru_pembimbing_id' => '1',
                'nisn' => '20004000' . $i,
                'tempat_lahir' => 'Jl. Cempaka No. ' . $i,
                'tgl_lahir' => '2008-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'Jl. Cempaka No. ' . $i,
                'kelas' => 'XII-A',
                'nama_orangtua' => 'Rafli' . $i,
                'no_hp_orangtua' => '0812356778' . $i,
            ]);
        }
    }
}
