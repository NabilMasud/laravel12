<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseCreate extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $thumbnail;

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|max:1024', // Maksimal 1MB
        ]);

        $thumbnailPath = $this->thumbnail ? $this->thumbnail->store('thumbnails', 'public') : null;

        Course::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'thumbnail' => $thumbnailPath,
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Kursus berhasil ditambahkan!');
        return redirect()->to('/courses');
    }
    public function render()
    {
        return view('livewire.course-create');
    }
}
