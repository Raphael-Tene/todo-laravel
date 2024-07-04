<?php

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/todos', function () {
    $todos = Todo::with('user')->latest()->paginate(6);
    return view('todo.index', ['todos' => $todos]);
});

Route::get('/todos/create', function () {
    return view('todo.create');
});

Route::post('/todos/store', function (Request $request) {
    $request->validate([
        'title' => ['required', 'max:250', 'min:3'],
        'status' => ['required']
    ]);

    Todo::create([
        'title' => request('title'),
        'status' => request('status'),
        'user_id' => 1 // ToDO: Auth::id()
    ]);

    return redirect('/todos');
})->name('todos.store');

Route::get('/todos/{id}', function ($id) {
    $todo = Todo::with('user')->findOrFail($id);
    return view('todo.show', ['todo' => $todo]);
});
