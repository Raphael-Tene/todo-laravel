<?php

use App\Models\Todo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});



Route::get('/todos', function () {

    $todos = Todo::all();

    return view('todos', ['todos' => $todos]);
});


Route::get('/todos/{id}', function ($id) {
    $todo = Todo::findOrFail($id);
    return view('todo', ['todo' => $todo]);
});
