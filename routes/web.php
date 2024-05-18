 <?php

    use App\Http\Controllers\AboutController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\StoreController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\Auth\RegisteredUserController;
    use App\Http\Controllers\LocationController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\BusinessHourController;
    use App\Http\Controllers\Auth\NewPasswordController;
    use App\Http\Controllers\Auth\PasswordResetLinkController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\PasswordController;
    use App\Http\Controllers\Auth\VerifyEmailController;
    use App\Http\Controllers\Auth\VerificationController;
    use App\Http\Controllers\AddressController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/layout', function () {
        return view('layout.app');
    });

    //Authetication Routes
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('signup');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



    //forgot-password Routes
    // Display the password reset link request form
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    // Handle the password reset link request submission
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    //Reset-password Routes
    // Display the password reset form
    Route::get('/reset-password', [NewPasswordController::class, 'create'])->name('password.reset');
    // Handle the new password request
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

    //profile Routes
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('edit-profile',[ProfileController::class,'edit'])->name('edit.profile');
      // Profile Update Route
    Route::patch('/profile/update',[ProfileController::class,'update'])->name('profile.update');
      // Email Verification Route
    Route::post('/email/verification-notification',[ VerificationController::class, 'send'])->name('verification.send');
    //update password 
    Route::middleware(['auth'])->group(function () {Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');});

    //delete account
    Route::delete('/delete-account',[ProfileController::class,'destroy'])->name('delete.user');

    //your orders Route
    Route::get('/your-orders',function(){
         return view('orders.yourOrders');
    })->name('your-orders');
   
    //address Routes 
    Route::get('/address',[AddressController::class,'index'])->name('address.index');


    //Basic Routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');


    //Store Routes
    Route::get('/store', function () {
        return view('store.store');
    });
    // Route::get('/store/{userId}', [StoreController::class, 'show'])->name('store.show');
    Route::get('/store/{userId}/edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('/store/{userId}', [StoreController::class, 'update'])->name('store.update');
    Route::post('/store/{userId}/product', [StoreController::class, 'addProduct'])->name('store.product.add');
    Route::delete('/store/{userId}/product/{productId}', [StoreController::class, 'deleteProduct'])->name('store.product.delete');


    //location Routes
    Route::get('/locations/{locationId}', [LocationController::class, 'show'])->name('location.show');
    Route::get('/locations/{locationId}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/locations/{locationId}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/locations/{locationId}', [LocationController::class, 'destroy'])->name('location.destroy');

    //Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cartItem}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('/partials/cart_total', [CartController::class, 'cartTotal'])->name('cart.total');

    //BusinessHours Routes
    Route::get('/business_hours', [BusinessHourController::class, 'index'])->name('business_hours.index');
    Route::post('/business_hours', [BusinessHourController::class, 'store'])->name('business_hours.store');
    Route::put('/business_hours/{businessHour}', [BusinessHourController::class, 'update'])->name('business_hours.update');
    Route::delete('/business_hours/{businessHour}', [BusinessHourController::class, 'destroy'])->name('business_hours.destroy');


    //products Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Routes for creating, updating, and deleting products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');