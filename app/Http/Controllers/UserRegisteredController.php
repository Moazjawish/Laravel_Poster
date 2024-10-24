<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisteredController extends Controller
{
    public function create()
    {
        return view('auth.signup');
    }
    public function store(Request $request)
    {
        // validate:
        $request->validate([
            'first_name' => ['required', 'min:5'],
            'last_name' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'confirmed'],
            'password_confirmation' => ['required', 'min:5'],
        ]);
            $user = User::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'email' => request('email'),
                'password' => request('password'),
                'password_confirmation' => request('password_confirmation'),
            ]);
            Auth::login($user);
            return redirect('/');
    }
}
