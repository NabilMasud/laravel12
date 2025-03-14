<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class MyCourses extends Component
{
    public function render()
    {
        $enrolledCourses = Auth::user()->enrollments()->with('course')->get();

        return view('livewire.my-courses', compact('enrolledCourses'));    
    }
}
