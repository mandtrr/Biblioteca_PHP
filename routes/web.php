<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::resource('livros', LivroController::class);

// Definir a rota para listar livros
Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');

// Definir a rota para exibir detalhes de um livro específico
Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
