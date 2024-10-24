<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $validated = request()->validate([
            'email' => ['required', 'email', 'min:5'],
            'password' => ['required', 'min:5']
        ]);
        if(!Auth::attempt($validated))
        {
            throw  ValidationException::withMessages([
                'email' => 'The credinatlas does not match'
            ]);
        }
        request()->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/signup');
    }
}
