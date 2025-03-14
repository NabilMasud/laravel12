<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

#[Layout('components.layouts.app')]

class CourseIndex extends Component
{
    public $courses;
    public function mount(){
        $this->courses = Course::with('instructor')->get();
    }
    public function render()
    {
        return view('livewire.course-index');
    }
}
