<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('user')->latest()->paginate(6);
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:250', 'min:3'],
            'status' => ['required']
        ]);

        Todo::create([
            'title' => request('title'),
            'status' => request('status'),
            'user_id' => Auth::id()
        ]);

        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {

        Gate::authorize('update-todo', $todo);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => ['required', 'max:250', 'min:3'],
            'status' => ['required']
        ]);
        $todo->update([
            'title' => request('title'),
            'status' => request('status')
        ]);

        return redirect('/todos/' . $todo->id)->with('message', 'Todo Updated Successfully!');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect('/todos')->with('message', 'Todo Deleted Successfully!');
    }

    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }
}
