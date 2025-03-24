<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Livewire\WithFileUploads;



class LessonManage extends Component
{
    use withFileUploads;
    public $courseId, $title, $content;
    public $lessons;
    public $file;

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
            'file' => 'nullable|mimes:pdf,doc,docx,mp4|max:10240', // Max 10MB
        ]);

        // $filePath = null;
        // if ($this->file) {
        //     $filePath = $this->file->store('lesson_files', 'public'); // Simpan ke storage/app/public/lesson_files
        // }

        $filePath = $this->file ? $this->file->store('lesson_files', 'public') : null;

        Lesson::create([
            'course_id' => $this->courseId,
            'title' => $this->title,
            'content' => $this->content,
            'file' => $filePath,
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
