<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;

use Carbon\Carbon;

class AuthController extends Controller
{

    public function verifyEmail($userId)
    {
        dd($userId);
        $signedUrl = URL::temporarySignedRoute(
            'verification.verify', 
            Carbon::now()->addHours(24),
            ['user' => $userId]
        );

        return $signedUrl;
    }
    
    public function resetPassword($user)
    {
        print_r($user); die;
        $request->validate([

            'email' => 'required|email|exists:users',

        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

}