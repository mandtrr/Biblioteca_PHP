<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de Livros (CRUD e Pesquisa)
Route::prefix('livros')->group(function () {
    Route::get('/', [LivroController::class, 'index'])->name('livros.index'); // Listar livros
    Route::get('/search', [LivroController::class, 'search'])->name('livros.search'); // Pesquisa de livros
    Route::get('/create', [LivroController::class, 'create'])->name('livros.create'); // Formulário para adicionar livro
    Route::post('/', [LivroController::class, 'store'])->name('livros.store'); // Salvar novo livro
    Route::get('/{id}/edit', [LivroController::class, 'edit'])->name('livros.edit'); // Formulário para editar livro
    Route::put('/{id}', [LivroController::class, 'update'])->name('livros.update'); // Atualizar livro
    Route::delete('/{id}', [LivroController::class, 'destroy'])->name('livros.destroy'); // Deletar livro
    Route::get('/{id}', [LivroController::class, 'show'])->name('livros.show'); // Detalhes do livro
});

// Dashboard (com autenticação)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de Perfil de Usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Requer autenticação para rotas adicionais
require __DIR__.'/auth.php';
