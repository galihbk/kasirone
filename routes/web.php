<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
});

require __DIR__ . '/auth.php';
