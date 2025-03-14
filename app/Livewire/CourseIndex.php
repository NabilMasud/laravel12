<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.app')]

class CourseIndex extends Component
{
    public $courses;
    public function mount(){
        $this->courses = Course::with('instructor')->get();
    }

    public function delete($id){
        $course = Course::findOrFail($id);

        if ($course->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $course->delete();

        session()->flash('message', 'Kursus berhasil dihapus!');
        return redirect()->to('/courses');
    }

    public function render()
    {
        return view('livewire.course-index');
    }
}
