<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BateauController;


Route::get('/', function () {
    return view('accueil');
})->name('home');



Route::get('/bateaux', [BateauController::class, 'index'])->name('bateaux.index');
Route::get('/bateaux/ajouter', [BateauController::class, 'create'])->name('bateaux.create');
Route::post('/bateaux', [BateauController::class, 'store'])->name('bateaux.store');
Route::get('/bateaux/{id}', [BateauController::class, 'show'])->name('bateaux.show');
Route::delete('/bateaux/{id}', [BateauController::class, 'destroy'])->name('bateaux.destroy');

Route::get('/dashboard', function () {
    return redirect()->route('bateaux.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('comptes', function () {})->middleware('auth');
