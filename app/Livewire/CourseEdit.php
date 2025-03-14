<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseEdit extends Component
{
    use WithFileUploads;

    public $courseId, $title, $description, $price, $thumbnail, $newThumbnail;

    public function mount($id)
    {
        $course = Course::findOrFail($id);

        // hanya instruktur yang bisa mengedit kursusnya sendiri
        if ($course->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $this->courseId = $course->id;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->price = $course->price;
        $this->thumbnail = $course->thumbnail;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'newThumbnail' => 'nullable|image|max:1024',
        ]);

        $course = Course::findOrFail($this->courseId);

        if ($course->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($this->newThumbnail) {
            $thumbnailPath = $this->newThumbnail->store('thumbnails', 'public');
        } else {
            $thumbnailPath = $this->thumbnail;
        }

        $course->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'thumbnail' => $thumbnailPath,
        ]);

        session()->flash('message', 'Kursus berhasil diperbarui!');
        return redirect()->to('/courses');
    }

    public function render()
    {
        return view('livewire.course-edit');
    }
}
