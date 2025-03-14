<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CourseIndex;
use App\Livewire\CourseCreate;
use App\Livewire\CourseEdit;
use App\Livewire\CourseDetail;
use App\Livewire\LessonManage;
use App\Livewire\CourseEnroll;
use App\Livewire\MyCourses;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    
Route::middleware(['auth'])->group(function () {
    Route::get('courses', CourseIndex::class)->name('courses');
    Route::get('courses/create', CourseCreate::class);
    Route::get('courses/{id}/edit', CourseEdit::class);
    Route::get('/courses/{id}', CourseDetail::class);
    Route::get('/courses/{id}/lessons', LessonManage::class);
    Route::get('/courses/{id}/enroll', CourseEnroll::class);
    Route::get('/my-courses', MyCourses::class);
});

require __DIR__.'/auth.php';
