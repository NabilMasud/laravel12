<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CourseIndex;
use App\Livewire\CourseCreate;
use App\Livewire\CourseEdit;

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
});

require __DIR__.'/auth.php';
