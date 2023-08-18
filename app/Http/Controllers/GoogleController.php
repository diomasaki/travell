<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        try{
            $user = Socialite::driver('google')->user();

            $findUser = User::where('google_id', $user->id)->first();

            if($findUser) {
                Auth::login($findUser);

                return redirect()->intended('/');
            }else{
                $newUser = User::updateOrCreate(['email'=> $user->email], [
                    'name'=> $user->name,
                    'google_id'=> $user->id,
                    'email'=> $user->email,
                    'password'=> Hash::make('password')
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}
