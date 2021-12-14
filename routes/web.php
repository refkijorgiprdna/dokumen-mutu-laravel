<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
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

Route::get('/', function () {
    return redirect()->route("login");
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('data-repository', RepositoryController::class);

Route::resource('data-admin', AdminController::class);

Route::resource('data-dosen', DosenController::class);

Route::resource('data-user', UserController::class);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

require __DIR__.'/auth.php';
