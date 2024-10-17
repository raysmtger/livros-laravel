<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivroController;

// Exibir a lista de livros
Route::get('livros', [LivroController::class, 'index'])->name('livros.index');

// Formulário para criar um novo livro
Route::get('livros/create', [LivroController::class, 'create'])->name('livros.create');

// Armazenar um novo livro
Route::post('livros', [LivroController::class, 'store'])->name('livros.store');


// Formulário para editar um livro existente
Route::get('livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');

// Atualizar um livro existente
Route::put('livros/{livro}', [LivroController::class, 'update'])->name('livros.update');

// Excluir um livro
Route::delete('livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('alunos', AlunoController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
