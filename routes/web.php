<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

Route::get('/', [TodoController::class, 'index']);
Route::get('/todos', [TodoController::class, 'viewTodos']);
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store'); 
Route::get('/view-todos', [TodoController::class, 'viewTodosList']);
Route::delete('todos/{todo}/soft-delete', [TodoController::class, 'softDelete'])->name('todos.soft-delete');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

