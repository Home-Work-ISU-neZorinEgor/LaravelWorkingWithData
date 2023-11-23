<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TodoController::class, 'index']);
Route::get('/todos', [TodoController::class, 'viewTodos']);
Route::post('/todos', [TodoController::class, 'store']);
Route::get('/view-todos', [TodoController::class, 'viewTodosList']);
Route::delete('todos/{todo}/soft-delete', [TodoController::class, 'softDelete'])->name('todos.soft-delete');
