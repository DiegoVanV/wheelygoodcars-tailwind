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
    Route::get('/cars/myCars/', [CarController::class, 'viewMyCars'])->name('cars.viewMyCars');
    Route::delete('/cars/{car}', [CarController::class, 'deleteCar'])->name('cars.delete');
    Route::get('/cars/main/', [CarController::class, 'main'])->name('cars.main');
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index'); // Pagina met zoekbalk (index)
    Route::post('/cars/search', [CarController::class, 'searchCar'])->name('cars.search'); // Zoeken op kenteken
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show'); // Pagina met auto-info


});

Route::middleware('auth')->group(function () {

});

Route::post('/cars/create/', [CarController::class, 'store'])->name('cars.store');

require __DIR__.'/auth.php';
