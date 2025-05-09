<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index'); // Pagina met zoekbalk (index)

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //
});

Route::middleware('auth')->group(function () {
    Route::get('/cars/form', [CarController::class, 'goToForm'])->name('goToForm');
    Route::post('/form-step1', [CarController::class, 'postStep1'])->name('form.step1.post');

    // Route for Step 2 (showing the result)
    Route::get('/form-step2', [CarController::class, 'step2'])->name('form.step2');

    Route::get('/cars/index/', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/myCars/', [CarController::class, 'viewMyCars'])->name('cars.viewMyCars'); // pagina om je eigen auto's te zien
    Route::get('/cars/AllCars/', [CarController::class, 'viewAllCars'])->name('cars.viewAllCars'); // pagina om alle auto's te zien
    Route::delete('/cars/{car}', [CarController::class, 'deleteCar'])->name('cars.delete');
    Route::post('/cars/search', [CarController::class, 'searchCar'])->name('cars.search'); // Zoeken op kenteken
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show'); // Pagina met auto-info
    Route::get('/cars/{id}', [CarController::class, 'showDetailPage'])->name('cars.show');


});

Route::middleware('auth')->group(function () {

});

Route::post('/cars/create/', [CarController::class, 'store'])->name('cars.store');

require __DIR__.'/auth.php';
