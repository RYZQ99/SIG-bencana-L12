<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BencanaController;
use Illuminate\Support\Facades\Route;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route authentication (tidak perlu middleware auth)
require __DIR__.'/auth.php';

// Route yang memerlukan autentikasi
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk manajemen bencana
    Route::resource('bencana', BencanaController::class);

    // Route untuk serve file GeoJSON
    Route::get('/geojson/{bencana}', function (App\Models\Bencana $bencana) {
        return response()->file(storage_path('app/'.$bencana->geojson_path));
    })->name('geojson.show');
});