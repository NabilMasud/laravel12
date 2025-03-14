<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class CourseEnroll extends Component
{
    public $course;

    public function mount($id)
    {
        $this->course = Course::findOrFail($id);
    }

    public function enroll()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah user sudah terdaftar di kursus ini
        if (Enrollment::where('user_id', $user->id)->where('course_id', $this->course->id)->exists()) {
            session()->flash('message', 'Anda sudah terdaftar di kursus ini.');
            return;
        }

        // Daftarkan user ke kursus
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $this->course->id,
        ]);

        session()->flash('message', 'Berhasil mendaftar ke kursus!');
    }
    public function render()
    {
        return view('livewire.course-enroll');
    }
}
