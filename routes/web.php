<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UnregisteredUserController;
use App\Http\Controllers\UserSession;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [UnregisteredUserController::class, 'create'])->name('register');
Route::post('/register', [UnregisteredUserController::class, 'store']);

Route::get('/login', [UserSession::class, 'create'])->name('login');
Route::post('/login', [UserSession::class, 'store'])->name('login.store');

Route::delete('/logout', function () {
    auth()->logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/todos', [TodoController::class, 'index']);

Route::get('/todos/create', [TodoController::class, 'create']);

Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

Route::delete('/todos/{todo}', [TodoController::class, 'delete'])->name('todos.delete');
Route::get('/todos/{todo}', [TodoController::class, 'show']);
