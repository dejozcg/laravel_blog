<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionControler extends Controller
{
    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Goodby!');
    }

    public function store() {
        $attributes = request()->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email'     => 'Your provided credentials couyld not be verified.'
        ]);
    }

    public function create() {
        return view('register.login');
    }
}
