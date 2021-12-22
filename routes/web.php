<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepositoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect()->route("login");
// });

Route::middleware(['admin','auth'])
->group(function() {
    Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::resource('dokumen-mutu', RepositoryController::class);
    Route::get('dokumen-mutu/download/{nama_file}', [RepositoryController::class, 'download'])->name('repository.download');

    Route::resource('data-admin', AdminController::class);

    Route::resource('data-user', UserController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])
->group(function() {
    Route::get('/show/{id}', [HomeController::class, 'show'])->name('home.show');
    Route::get('/download/{nama_file}', [HomeController::class, 'download'])->name('download');

    Route::get('/user/profile', [ProfileController::class, 'edit_user'])->name('profile.edit_user');
    Route::patch('/user/profile/update', [ProfileController::class, 'update_user'])->name('profile.update_user');
});

Route::get('/', [HomeController::class, 'index'])->name('home');




require __DIR__.'/auth.php';
