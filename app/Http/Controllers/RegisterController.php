<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create() {
        return view('register.create');
    }

    public function store() {
        
        $atribudes = request()->validate([
            'name'          => ['required', 'max:255'],
            'username'      => ['required', 'max:255', Rule::unique('users','username')],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'      => ['required', 'min:7', 'max:255']
        ]);

        $user = User::create($atribudes);

        // Log the user in
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');

        /*
         ovo je isto
         session()->flash('success', 'Your account has been created');
         return redirect('/');
         
         sa ovim
         return redirect('/')->with('success', 'Your account has been created');
         */
    }
}
