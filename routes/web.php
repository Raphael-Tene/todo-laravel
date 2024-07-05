<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/todos', [TodoController::class, 'index']);

Route::get('/todos/create', [TodoController::class, 'create']);

Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

Route::delete('/todos/{todo}', [TodoController::class, 'delete'])->name('todos.delete');
Route::get('/todos/{todo}', [TodoController::class, 'show']);
