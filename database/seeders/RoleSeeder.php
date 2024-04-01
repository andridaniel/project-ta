<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Mengimpor model Role
use Illuminate\Support\Facades\Schema;

Schema::disableForeignKeyConstraints();
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Hapus data yang sudah ada
        Role::truncate();

        // Tambahkan data baru
        Role::create([
            'nama' => 'admin',
        ]);

        Role::create([
            'nama' => 'guru pembimbing',
        ]);

        Role::create([
            'nama' => "siswa"
        ]);
        // Tambahkan data lainnya
    }
}

Schema::enableForeignKeyConstraints();
