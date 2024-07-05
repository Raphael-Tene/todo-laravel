<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UnregisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:250', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::min(6), 'confirmed'],

        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        auth()->attempt($request->only('email', 'password'));



        return redirect('/todos');
    }
}
