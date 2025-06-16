<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Pagrindinis puslapis
Route::get('/', function () {
    return view('welcome');
});

// Autentifikuoti naudotojai (prisijungę ir patvirtinti)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Nuomotojo maršrutai (CRUD įrangai)
    Route::resource('equipment', EquipmentController::class);

    // Papildomas route kategorijų filtravimui pagal tipą (AJAX)
    Route::get('/kategorijos-by-tipas', [EquipmentController::class, 'getKategorijosByTipas'])->name('kategorijos.by.tipas');

    // Nuomininko puslapis (įrangos peržiūra ir nuoma)
    Route::get('/rent', [RentController::class, 'index'])->name('rent.index');

    // Nuomos patvirtinimas (forma POST)
    Route::post('/rent/{id}', [RentController::class, 'store'])->name('rent.store');

    Route::get('/mano-nuomos', [RentController::class, 'myRentals'])->name('rent.my');

    // Dashboard (neprivalomas, jei nenaudoji)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
