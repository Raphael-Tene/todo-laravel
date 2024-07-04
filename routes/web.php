<?php

use App\Models\Todo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});



Route::get('/todos', function () {

    $todos = Todo::with('user')->paginate(6);

    return view('todos', ['todos' => $todos]);
});


Route::get('/todos/{id}', function ($id) {
    $todo = Todo::with('user')->findOrFail($id);
    return view('todo', ['todo' => $todo]);
});
