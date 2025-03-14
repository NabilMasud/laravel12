<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CourseIndex;
use App\Livewire\CourseCreate;

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
});

require __DIR__.'/auth.php';
