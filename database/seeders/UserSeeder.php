<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
            'role' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);


        // Use the factory to create more user data
        UserFactory::new()->count(10)->create();
    }
}
