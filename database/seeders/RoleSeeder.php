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
            'nama_role' => 'admin',
        ]);

        Role::create([
            'nama_role' => 'guru_pembimbing',
        ]);

        Role::create([
            'nama_role' => "siswa"
        ]);
        // Tambahkan data lainnya
    }
}

Schema::enableForeignKeyConstraints();
