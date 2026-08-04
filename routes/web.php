<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeojsonFileController;
use App\Http\Controllers\PageController;

// 🟩 1. Landing Page (tanpa login)
// 🟩 Landing Page
Route::get('/', [PageController::class, 'landing'])->name('landing');

// 🟩 Halaman Publik
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

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
    Route::get('/geojson', [GeojsonFileController::class, 'index'])->name('geojson.index');
    Route::get('/geojson/create', [GeojsonFileController::class, 'create'])->name('geojson.create');
    Route::post('/geojson/store', [GeojsonFileController::class, 'store'])->name('geojson.store');
    Route::get('/geojson/{id}', [GeojsonFileController::class, 'show'])->name('geojson.show');
    Route::get('/geojson/deploy/{id}', [GeojsonFileController::class, 'deploy'])->name('geojson.deploy');
    Route::delete('/geojson/{id}', [GeojsonFileController::class, 'destroy'])->name('geojson.destroy');
    Route::get('/geojson/undeploy/{id}', [GeojsonFileController::class, 'undeploy'])
    ->name('geojson.undeploy');
});

// 🟦 5. Route file GeoJSON (tanpa login)
Route::get('/geojson/{bencana}', function (App\Models\Bencana $bencana) {
    return response()->file(storage_path('app/' . $bencana->geojson_path));
})->name('geojson.show');




