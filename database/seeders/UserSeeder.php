<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin
        User::create([
            'name' => 'Admin E-Learning',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat instruktur
        User::create([
            'name' => 'Instruktur Laravel',
            'email' => 'instruktur@example.com',
            'password' => Hash::make('password123'),
            'role' => 'instructor',
        ]);

        // Buat beberapa siswa
        User::create([
            'name' => 'Siswa 1',
            'email' => 'siswa1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Siswa 2',
            'email' => 'siswa2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
    }
}
