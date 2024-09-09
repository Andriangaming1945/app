<?php

use App\Http\Controllers\Biograficontroller;
use App\Http\Controllers\Magangcontroller;
use App\Http\Controllers\Organisasicontroller;
use App\Http\Controllers\Profilcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sertifikatcontroller;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ProfilController::class, 'getProfileData'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function() {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/magang', Magangcontroller::class);
    Route::resource('/organisasi', Organisasicontroller::class);

    Route::resource('/profil', Profilcontroller::class);
    Route::resource('/biografi', Biograficontroller::class);
    
    Route::resource('/sertifikat', Sertifikatcontroller::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
