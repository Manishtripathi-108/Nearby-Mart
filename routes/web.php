<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BusinessHourController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;


// Welcome Page
Route::get('/', function () {
    return view('welcome');
});


// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('signup');

    // Forgot Password Routes
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Reset Password Routes
    Route::get('/reset-password', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

// Profile Route
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('edit-profile', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'send'])->name('verification.send');
    Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');
    Route::delete('/delete-account', [ProfileController::class, 'destroy'])->name('delete.user');
    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Basic Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


// Store Routes
Route::middleware(['auth'])->group(function () {

    // Store routes
    Route::resource('store', StoreController::class);

    /*
        It is for the store product routes. where store will manage the products.

        this will create the following routes: store.product.index => /store/{store}/product, 
        store.product.create, store.product.store, store.product.show,
        store.product.edit, store.product.update, store.product.destroy 
    */
    Route::resource('store.product', StoreProductController::class);
});

// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

//checkout Routes 
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});
// BusinessHours Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('business_hours', BusinessHourController::class)->except(['create', 'edit']);
});

// Your Orders Route and Address Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/your-orders', function () {
        return view('orders.yourOrders');
    })->name('your-orders');

    Route::get('/address', [AddressController::class, 'index'])->name('address.index');
});


// Debugging Routes
Route::get('/dd', function () {
    $user = auth()->user();
    $store = $user->stores();
    dd($store);
    echo "<br>";
    dd("done");
});