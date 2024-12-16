<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::resource('livros', LivroController::class);  // Rota para todas as ações CRUD dos livros

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (opcional, caso use autenticação)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil de usuário (opcional, caso use autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Requer autenticação para usar as rotas acima
require __DIR__.'/auth.php';

