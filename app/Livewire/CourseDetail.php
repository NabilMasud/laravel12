<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseDetail extends Component
{
    public $course;

    public function mount($id)
    {
        $this->course = Course::with('lessons')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.course-detail');
    }
}
