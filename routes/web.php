<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CourseIndex;
use App\Livewire\CourseCreate;
use App\Livewire\CourseEdit;
use App\Livewire\CourseDetail;
use App\Livewire\LessonManage;
use App\Livewire\CourseEnroll;
use App\Livewire\MyCourses;
use App\Http\Middleware\EnsureUserIsInstructor;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    
Route::middleware(['auth'])->group(function () {
    Route::get('courses', CourseIndex::class)->name('courses');
    Route::middleware(EnsureUserIsInstructor::class)->group(function () {
        Route::get('courses/create', CourseCreate::class)->name('courses.create');
        Route::get('courses/{id}/edit', CourseEdit::class)->name('courses.edit');
        Route::get('/courses/{id}/lessons', LessonManage::class)->name('courses.lessons');
    });
    Route::get('/courses/{id}', CourseDetail::class)->name('courses.detail');
    Route::get('/courses/{id}/enroll', CourseEnroll::class)->name('courses.enroll');
    Route::get('/my-courses', MyCourses::class)->name('my-courses');
});
Route::middleware(['auth', EnsureUserIsInstructor::class])->group(function () {
});


require __DIR__.'/auth.php';
