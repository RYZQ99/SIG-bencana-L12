<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetaController;
use Illuminate\Support\Facades\Route;

// 🟩 1. Landing Page (tanpa login)
// Landing page jadi halaman root
Route::get('/', function () {
    return view('landing');
})->name('landing');



// 🟩 2. Dashboard Tanpa Login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// 🟩 3. Peta Tanpa Login
Route::get('/peta', [PetaController::class, 'index'])
    ->name('peta.index');

// 🔹 Route Login
require __DIR__.'/auth.php';

// 🟥 4. Route khusus admin (butuh login)
Route::middleware(['auth', 'verified'])->group(function () {

    // Hanya admin yang boleh CRUD bencana
    Route::resource('bencana', BencanaController::class);

    // Admin Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🟦 5. Route file GeoJSON (tanpa login)
Route::get('/geojson/{bencana}', function (App\Models\Bencana $bencana) {
    return response()->file(storage_path('app/' . $bencana->geojson_path));
})->name('geojson.show');
