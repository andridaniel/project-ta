<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru_Pembimbing;
use Database\Factories\UserFactory; // Import UserFactory from Database\Factories namespace
use Illuminate\Support\Facades\Schema;


Schema::disableForeignKeyConstraints();
class PembimbingSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'role_id' => '2',
                'name' => 'guru' . $i,
                'email' => 'guru' . $i . '@gmail.com',
                'no_hp' => '0812356778' . $i,
                'gambar_profile' => 'default.png',
                'password' => Hash::make('12345678'),
            ]);

            Guru_Pembimbing::create([
                'user_id' => $user->id,
                'tempat_lahir' => 'Jl. Cempaka No. ' . $i,
                'tgl_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'Jl. Cempaka No. ' . $i,
                'wali_kelas' => 'XII-A',
            ]);
        }
    }
}
