<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseDetail extends Component
{
    public $course;
    public $students = [];
    public $showStudents = false;
    public $loading = false;
    public $studentCount;

    public function mount($id)
    {
        $this->course = Course::withCount('students')->with('lessons')->findOrFail($id);
        if (Auth::user()->isInstructor()) {
            $this->studentCount = $this->course->students_count;
        }
        // dd($this->course);
    }

    public function loadStudents()
    {
        $this->loading = true;
        // sleep(2); // Simulasi loading
        $this->students = $this->course->students;
        $this->showStudents = true;
        $this->loading = false;
        // dd($this->students);
    }

    public function render()
    {
        return view('livewire.course-detail');
    }
}
