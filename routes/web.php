<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home-page', function () {
    return view('home-page');
})->name('home-page');

Route::get('/about', function () {
    return view('livewire.about');
});

Route::get('/services', function () {
    return view('livewire.services');
});

Route::get('/layout', function () {
    return view('layout');
})->name('layout');

Route::get('/contact', function () {
    return view('livewire.contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
  
require __DIR__.'/auth.php';
