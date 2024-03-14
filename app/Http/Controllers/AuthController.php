<?php

namespace App\Http\Controllers;

use App\Models\Deparment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function store()
    {

        $validated = request()->validate([
            'name' => 'required | min: 3 | max: 255',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | confirmed',
            'gender' => 'required',
        ]);

        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->gender = $validated['gender'];
        $user->password = Hash::make($validated['password']);
        if(isset(request()->is_doctor) && request()->is_doctor  === 'on'){
            $user->is_doctor =  true;
        };
        $user->save();

        if(isset(request()->is_doctor) && request()->is_doctor  === 'on'){
            return redirect()->route('stepup');
        };
        return redirect()->route('home');
    }

    public function auth_check()
    {

        $validated = request()->validate([
            'email' => 'required | email ',
            'password' => 'required ',
        ]);

        if(Auth::attempt($validated)){

            request()->session()->regenerate();
            if(auth()->user()->is_doctor){
                return redirect()->route('stepup');
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function logout()
    {

        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    }
}
