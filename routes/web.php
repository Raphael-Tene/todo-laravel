<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UnregisteredUserController;
use App\Http\Controllers\UserSession;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');


Route::get('/register', [UnregisteredUserController::class, 'create'])->name('register');
Route::post('/register', [UnregisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [UserSession::class, 'create'])->name('login');
Route::post('/login', [UserSession::class, 'store'])->name('login.store');

Route::delete('/logout', function () {
    auth()->logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');


Route::middleware(['auth'])->prefix('todos')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/store', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::patch('/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/{todo}', [TodoController::class, 'delete'])->name('todos.delete');
    Route::get('/{todo}', [TodoController::class, 'show'])->name('todos.show');
});
