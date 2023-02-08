<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        if(!Auth::attempt($credentials)){
            return redirect()->intended('/signin')->withSucess('Invalid credentials');
        }

        if(Auth::user()->email_verified_at == NULL) {
            $this->signOut();
            return redirect('/signin')->withErrors('User Email not verified!');
        }
        
        return redirect('/')->withSuccess('Success!');
    }

    public function register(Request $request) {
        if(Auth::check()) {return redirect('signin')->withErrors('User already signed in');}
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:15|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $mailData = $user->only('id');
        Mail::to($request->email)->send(new VerificationEmail($mailData));

        return redirect('/')->withSucess('Account Created Sucessfuly');

    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect('/signin');
    }

    public function verifyemail($id) {
        $user = User::find($id);

        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect('/signin')->with('status', 'User email verified');
    }
}
