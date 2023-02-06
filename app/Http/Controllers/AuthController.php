<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signIn(Request $request) {
        if(Auth::check()) {return redirect('signin')->withErrors('User already signed in');}
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/')->withSucess('Signed in');
        }
        return redirect('/signin')->withErrors('Invalid credentials!');
    }

    public function register(Request $request) {
        if(Auth::check()) {return redirect('signin')->withErrors('User already signed in');}
        $isAdmin = false;
        if($request->admin){
            $isAdmin = true;
        }
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:15|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => $isAdmin
        ]);

        $this->signIn($request);

        return redirect('/')->withSucess('Account Created Sucessfuly');

    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect('/signin');
    }
}
