 <?php

use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BusinessHourController;


Route::get('/',function(){
    return view('welcome');
});

Route::get('/layout',function(){
    return view('layout.app');
});
//Authetication Routes
Route::get('/login',[AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/register',[RegisteredUserController::class, 'create'])->name('register');
Route::post('/register',[RegisteredUserController::class, 'store'])->name('signup');
Route::post('/login',[AuthenticatedSessionController::class, 'store'])->name('login');


//Basic Routes
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/about',[Aboutcontroller::class, 'index'])->name('about');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');


//Store Routes

Route::get('/store',function(){
       return view('store.store');
});
Route::get('/store/{storeId}', [StoreController::class, 'show'])->name('store.show');
Route::get('/store/{storeId}/edit', [StoreController::class, 'edit'])->name('store.edit');
Route::put('/store/{storeId}', [StoreController::class, 'update'])->name('store.update');
Route::post('/store/{storeId}/product', [StoreController::class, 'addProduct'])->name('store.product.add');
Route::delete('/store/{storeId}/product/{productId}', [StoreController::class, 'deleteProduct'])->name('store.product.delete');


//location Routes
Route::get('/locations/{locationId}', [LocationController::class, 'show'])->name('location.show');
Route::get('/locations/{locationId}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('/locations/{locationId}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/locations/{locationId}', [LocationController::class, 'destroy'])->name('location.destroy');

//Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

//BusinessHours Routes
Route::get('/business_hours', [BusinessHourController::class, 'index'])->name('business_hours.index');
Route::post('/business_hours', [BusinessHourController::class, 'store'])->name('business_hours.store');
Route::put('/business_hours/{businessHour}', [BusinessHourController::class, 'update'])->name('business_hours.update');
Route::delete('/business_hours/{businessHour}', [BusinessHourController::class, 'destroy'])->name('business_hours.destroy');






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
  
// require __DIR__.'/auth.php';
