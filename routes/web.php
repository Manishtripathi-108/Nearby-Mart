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
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\AddProductsController;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
})->middleware(RedirectIfAuthenticated::class)->name('welcome');

Route::get('/wishlist', function () {
    return view('orders.wishList');
})->name('wishlist');


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
    Route::post('/upload-image', [ProfileController::class, 'upload'])->name('upload.image');
    Route::delete('/delete-account', [ProfileController::class, 'destroy'])->name('delete.user');
    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});

// Basic Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/product-details/{product}', [ProductController::class, 'details'])->name('products.show');


// Store Routes
Route::middleware(['auth'])->group(function () {

    // Store Dashboard
    Route::get('/store/dashboard', [StoreController::class, 'dashboard'])->name('store.dashboard');

    // Store Update Business Hours
    Route::put('/store/{store}/business-hours', [StoreController::class, 'updateBusinessHours'])->name('store.updateBusinessHours');

    // Store routes
    Route::resource('store', StoreController::class);

    /*
        It is for the store product routes. where store will manage the products.

        this will create the following routes: store.products.index => /store/{store}/products, 
        store.products.create, store.products.store, store.products.show,
        store.products.edit, store.products.update, store.products.destroy 
    */
   

    Route::resource('store.products', StoreProductController::class);
    

});

//add products routes
Route::middleware(['auth'])->group(function()
    {   Route::get('/products',[StoreProductController::class,'index'])->name('products.index');
        Route::get('/products/create', [StoreProductController::class, 'create'])->name('products.create');
        Route::post('/products', [StoreProductController::class, 'store'])->name('products.store');
        Route::get('/products/all', [StoreProductController::class, 'allProducts'])->name('products.all');
        Route::get('/products/edit',[StoreProductController::class,'edit'])->name('products.edit');
        Route::post('/product-update',[StoreProductController::class,'update'])->name('products.update');
    }
);


// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/destroy/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
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


});

// Address Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::get('/addresses/{id}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::patch('/addresses/{id}/default', [AddressController::class, 'setDefault'])->name('addresses.setDefault');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
});



// Debugging Routes
Route::get('/dd', function () {
    $store = auth()->user()->stores()->create([
        'name' => 'store_namexx',
        'email' => 'emailcc',
        'address_id' => '90',
        'phone' => '36217836712',
    ]);

    // Debug and output
    dd($store);
    echo "<br>";
    dd("done");


});