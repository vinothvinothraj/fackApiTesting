<?php

use App\Http\Livewire\LandingPage\GetSpecificPost;
use App\Http\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LandingPage\Home;

Route::get('/', Home::class)->name('home');
Route::get('/post', GetSpecificPost::class)->name('post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/users', UserIndex::class)->name('users');
// Route::get('/users/create', UserCreate::class)->name('users.create');
// Route::get('/users/{user}/edit', UserUpdate::class)->name('users.edit');