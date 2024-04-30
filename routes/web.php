// <?php

use App\Http\Controllers\aboutcontroller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\contactController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

Route::get('/layout',function(){
    return view('layouts.layout')->name('layout');});

 Route::get('/home-page',[homeController::class, 'index'])->name('home-page');
Route::get('/about-page',[aboutcontroller::class, 'index'])->name('about-page');
Route::get('/contact-page',[contactController::class, 'index'])->name('contact-page');

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
