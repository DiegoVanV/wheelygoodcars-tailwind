<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //
});

Route::middleware('auth')->group(function () {
    Route::get('/cars/index/', [CarController::class, 'index'])->name('cars.index');

});
Route::post('/cars/create/', [CarController::class, 'store'])->name('cars.store');

require __DIR__.'/auth.php';
