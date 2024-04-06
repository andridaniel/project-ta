<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use Database\Factories\UserFactory; // Import UserFactory from Database\Factories namespace
use Illuminate\Support\Facades\Schema;


Schema::disableForeignKeyConstraints();
class UserSeeder extends Seeder
{
    public function run()
    {
        // Gunakan delete daripada truncate
        User::query()->delete();


        // Add new user data
        User::create([
            'role_id' => '1',
            'name' => 'admin',
            'email' => 'admin@example.com',
            'no_hp' => "08123567789",
            'password' => Hash::make('password'),
        ]);

        Admin::create([
            'user_id' => '1',
            'tempat_lahir' => 'Jl. Cempaka No. 10',
            'tgl_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'alamat' => 'Jl. Cempaka No. 10',
            'gambar_profile' => 'default.png',

        ]);

    }
}
