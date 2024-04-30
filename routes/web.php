 <?php

use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/',function(){
    return view('welcome');
});

Route::get('/login',[AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/register',[RegisteredUserController::class, 'create'])->name('register');

Route::get('/layout',function(){
    return view('layouts.app')->name('layout');});

 Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/about',[Aboutcontroller::class, 'index'])->name('about');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home-page', function () {
//     return view('home-page');
// })->name('home-page');

// Route::get('/about', function () {
//     return view('livewire.about');
// });

// Route::get('/services', function () {
//     return view('livewire.services');
// });

// Route::get('/layout', function () {
//     return view('layouts.layout');
// })->name('layout');

// Route::get('/contact-page', function () {
//     return view('contact-page');
// });

// Route::get('/about-page', function () {
//     return view('about-page');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
  
// require __DIR__.'/auth.php';
