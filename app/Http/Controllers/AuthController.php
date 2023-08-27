<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;


class AuthController extends Controller
{

    // LOGIN VIEW
    function indexOfLogin() {
        return view("login");
    }

    //LOGIN HANDLER
    function login(Request $request) {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success, berhasil login!');
        }else {
            return redirect('login')->withErrors('Email atau password tidak valid');
        }
    }


    //LOGOUT

    public function destroy() {
        Auth::logout();
        return redirect()->route('logouts');
    }


    //REGISTER
    function indexOfRegister() {
        return view("register");
    }



    function register(Request $request) {
        $request->validate([
            'name'=> 'required',
            'password'=> 'required',
            'email'=> 'required|email|unique:users',
            'phone'=> 'required|min:6',
        ], [
            'name.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'phone.required' => 'No Handphone Wajib Diisi',
        ]);

        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        User::create($data);

        $inforegister = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (($inforegister)) {
            return redirect('/login')->with('success' . 'Berhasil membuat akun!');
        }else {
            return redirect('/register')->withErrors('Gagal membuat akun!');
        }
    }

    public function indexOfResetPassword() {
        return view('forgotpassword');
    }


    public function resetPasswordHandler(Request $request) {

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }


    public function createNewPassword(Request $request) {
        return view('reset-password', ['request' => $request]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }


    public function profile() {
        return view('profile')->with('user', auth()->user());
    }


    public function updateProfile(Request $request) {
        $user = auth()->user();

        $user->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'User updated...');
        return redirect()->back();
    }

}
