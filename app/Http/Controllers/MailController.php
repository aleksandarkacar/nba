<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function makeEmail(Request $request){
        $request->validate([
            'email' => 'required|email',
            'user_id' => 'required|exists:user,id'
        ]);

        $mailData = $request->only('user_id');
        Mail::to($request->email)->send(new VerificationEmail($mailData));
    }
}
