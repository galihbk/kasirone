<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MidtransWebhookController;
use App\Models\Product;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/errors-404', function () {
    return view('errors.404');
})->name('404');
Route::middleware(['auth', 'menu.access'])->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/email-verification-link', [ProfileController::class, 'emailVerificationLink']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Pengaturan
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/data', [UsersController::class, 'getData'])->name('users.data');
    Route::get('/users/form-add', [UsersController::class, 'formAddUser'])->name('users.form-add');
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');

    //Kasir
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier');

    //Produk
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product-category', [ProductController::class, 'productCategory'])->name('product.category');
});
Route::middleware(['auth'])->group(function () {
    //Produk
    Route::get('/get-data-product', [ProductController::class, 'getDataProduct'])->name('product.get-data-product');
    Route::post('/add-category', [ProductController::class, 'addDataCategory'])->name('product.add-category');
    Route::post('/add-product', [ProductController::class, 'addDataProduct'])->name('product.add-product');
    Route::get('/get-data-category', [ProductController::class, 'getDataCategory'])->name('product.get-data-category');
    Route::delete('/delete-dategory/{id}', [ProductController::class, 'destroyCategory'])->name('product.delete-category');
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroyProduct'])->name('product.delete-product');
    Route::post('/product/update-category', [ProductController::class, 'updateCategory'])->name('product.update-category');
    Route::post('/product/update-product', [ProductController::class, 'updateProduct'])->name('product.update-product');


    Route::get('/subscription', [SubscriptionController::class, 'showPlans'])->name('subscription.plans');
    Route::get('/payment-method/{plan}', [SubscriptionController::class, 'paymentMethod'])->name('subscription.payment-method');
    Route::post('/subscription/create', [SubscriptionController::class, 'createInvoice'])->name('subscription.create');
});
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
});


require __DIR__ . '/auth.php';
