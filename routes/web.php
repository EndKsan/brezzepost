<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nova-pagina-publica', [MainController::class, 'nova_pagina_publica'])->name('ova_pagina_publica');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route news
Route::middleware(['auth'])->group(function(){
    Route::get('/nova-pagina', [MainController::class, 'nova_pagina'])->name('nova_pagina');
    Route::get('/testes', [MainController::class, 'testes'])->name('testes');
});


require __DIR__.'/auth.php';
