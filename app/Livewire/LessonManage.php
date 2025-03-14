<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;



class LessonManage extends Component
{
    public $courseId, $title, $content;
    public $lessons;

    public function mount($id)
    {
        $this->courseId = $id;
        $this->lessons = Lesson::where('course_id', $id)->get();
    }

    public function addLesson()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Lesson::create([
            'course_id' => $this->courseId,
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
        $this->lessons = Lesson::where('course_id', $this->courseId)->get();
        session()->flash('message', 'Materi berhasil ditambahkan!');
        return redirect()->to('/courses/' . $this->courseId . '/lessons');
    }

    public function deleteLesson($id)
    {
        Lesson::findOrFail($id)->delete();
        $this->lessons = Lesson::where('course_id', $this->courseId)->get();
        session()->flash('message', 'Materi berhasil dihapus!');
        return redirect()->to('/courses/' . $this->courseId . '/lessons');
    }

    public function render()
    {
        return view('livewire.lesson-manage');
    }
}
