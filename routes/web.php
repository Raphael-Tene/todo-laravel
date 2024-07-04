<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/todos', function () {
    $todos = Todo::with('user')->paginate(6);
    return view('todo.index', ['todos' => $todos]);
});

Route::get('/todos/create', function () {
    dd('Help');
});

Route::get('/todos/{id}', function ($id) {
    $todo = Todo::with('user')->findOrFail($id);
    return view('todo.show', ['todo' => $todo]);
});
