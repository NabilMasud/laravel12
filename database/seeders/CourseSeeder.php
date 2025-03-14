<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada user instruktur
        $instructor = User::where('role', 'instructor')->first();
        
        if (!$instructor) {
            $instructor = User::factory()->create(['role' => 'instructor']);
        }

        // Buat beberapa kursus
        Course::create([
            'title' => 'Belajar Laravel 12 dari Dasar',
            'description' => 'Panduan lengkap Laravel 12 untuk pemula hingga mahir.',
            'thumbnail' => fake()->imageUrl(640, 480, 'animals', true), // Placeholder gambar
            'price' => 150000,
            'user_id' => $instructor->id,
        ]);

        Course::create([
            'title' => 'Mastering Livewire & Alpine.js',
            'description' => 'Kursus interaktif untuk membangun aplikasi modern dengan Livewire dan Alpine.js.',
            'thumbnail' => fake()->imageUrl(640, 480, 'animals', true),
            'price' => 200000,
            'user_id' => $instructor->id,
        ]);

        Course::create([
            'title' => 'Membangun REST API dengan Laravel',
            'description' => 'Belajar membuat REST API profesional menggunakan Laravel.',
            'thumbnail' => fake()->imageUrl(640, 480, 'animals', true),
            'price' => 175000,
            'user_id' => $instructor->id,
        ]);
    }
}
