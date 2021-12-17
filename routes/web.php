<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
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

    Route::resource('data-repository', RepositoryController::class);

    Route::resource('data-admin', AdminController::class);

    Route::resource('data-user', UserController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])
->group(function() {
    Route::get('data-repository/download/{nama_file}', [RepositoryController::class, 'download'])->name('repository.download');
    Route::get('/show/{id}', [HomeController::class, 'show'])->name('home.show');

});

Route::get('/', [HomeController::class, 'index']);




require __DIR__.'/auth.php';
