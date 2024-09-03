<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\USerController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/dashboard', [USerController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(USerController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::post('dashboard/add_user', 'add')->name('dashboard.add_user');
    Route::post('dashboard/update_user/{id}', 'update')->name('dashboard.update_user');
    Route::get('dashboard/delete_user/{id}', 'delete')->name('dashboard.delete_user');
})->middleware(['auth', 'verified']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
