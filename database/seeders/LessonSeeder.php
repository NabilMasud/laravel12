<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Course;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = Course::first(); // Ambil kursus pertama

        if ($course) {
            Lesson::create([
                'course_id' => $course->id,
                'title' => 'Pengenalan Laravel 12',
                'content' => 'Dalam materi ini, kita akan belajar tentang dasar-dasar Laravel 12.'
            ]);

            Lesson::create([
                'course_id' => $course->id,
                'title' => 'Routing & Middleware',
                'content' => 'Belajar bagaimana cara kerja routing dan middleware di Laravel 12.'
            ]);
        }
    }
}
