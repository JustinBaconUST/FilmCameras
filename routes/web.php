<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\users;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('AdminMiddleware');


Route::get('/home', function () {
    return view('home');
})->middleware('AdminMiddleware');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/registerprompt', function () {
    return view('registerprompt');
})->name('registerprompt');

Route::get('/accountsetting', function () {
    return view('accountsetting');
})->name('accountsetting');

Route::get('/cart', function () {
    return view('cart');
})->name('cart')->middleware('AdminMiddleware');

Route::get('/manageusers', function () {
    $users = User::all();
    return view('admin.manageusers', compact('users'));
})->name('manageusers')->middleware('AdminAuthenticator');

Route::get('/manageorders', function () {
    return view('admin.manageorders');
})->name('manageorders')->middleware('AdminAuthenticator');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));

    })->name('dashboard');
});

Route::post('/update-profile-picture', [Users::class, 'updateProfilePicture'])->name('update-profile-picture');

Route::middleware(['auth'])->group(function () {
    Route::post('/change-password', [users::class, 'ChangePassword'])->name('password.change');
    Route::delete('/delete-user/{id}', [users::class, 'deleteUser'])->name('delete-user');
});

Route::get('/all/manageusers', [users::class, 'displayUser'])->name('AllUser');

Route::get('/edit-user/{id}', [users::class, 'editUser'])->name('edit-user');

Route::put('/update-user/{id}', [users::class, 'updateUser'])->name('update-user');

//product routes
Route::get('/products', [ProductController::class, 'index'])->name('products'); //for products.blade

Route::prefix('admin/products')->group(function () {
    Route::get('/manageproducts', [ProductController::class, 'manageProducts'])->name('admin.products.manageproducts');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::patch('/archive/{id}', [ProductController::class, 'archive'])->name('admin.products.archive'); // New archive route
});

//wishlist

Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.show');
Route::delete('/wishlist/remove/{wishlistItemId}', [WishlistController::class, 'removeFromWishlist'])
    ->name('wishlist.remove');

//cart
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/move-to-likes/{itemId}', [CartController::class, 'moveToLikes'])->name('cart.moveToLikes');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
});


