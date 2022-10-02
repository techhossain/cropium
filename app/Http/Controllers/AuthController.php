<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function register()
    {
        return view('authentication.register', [
            'title' => 'Register'
        ]);
    }

    public function processRegistration(Request $req)
    {
        $user = new User();

        // dd(User::doesntHave('roles')->get());

        $info = $req->validate([
            'name'      => 'required|max:50',
            'username'  => 'required|unique:users,username',
            'photo'     => 'required|image|mimes:jpg,png,jpeg',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
        ]);


        $user->name     = $req->name;
        $user->username = $req->username;
        // Photo upload
        $photoName = $req->file('photo')->hashName();
        $req->file('photo')->storeAs('public/images', $photoName);
        $user->photo    = $photoName;

        $user->email    = $req->email;
        $user->password = $req->password;


        // Assign role to the user
        $user->assignRole('subscriber');


        if ($user->save()) {

            event(new Registered($user));

            // $last = $user::latest()->first();

            // $last->notify(new RegisterNotification($last->name, $last->email));

            // Notification::send($last,  new RegisterNotification($last->name, $last->email));

            Auth::login($user);
            return redirect('/dashboard')->with('message', 'Registration Successful!!');
        }
    }


    public function login()
    {
        return view('authentication.login', [
            'title' => 'Login'
        ]);
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'         => 'required',
            'password'      => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return redirect('login')->with('invalidPassword', 'Wrong Password');


        // Auth::attempt([
        //     'email'  => $req->email,
        //     'password'  => $req->password
        // ]);

        // return redirect('/dashboard');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }


    public function dashboard()
    {
        return view('backend.dashboard', [
            'title' => 'Dashboard'
        ]);
    }



    // Email Vertification
    public function verification_notice()
    {
        $title = "Verification Notice";
        return view('authentication.email-verify', compact('title'));
    }

    // Email email_verify
    public function email_verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/dashboard')->with('message', 'Registration Successful!!');
    }

    // Resend Email verification link
    public function resend_link(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
        // return redirect('/dashboard')->with('message', 'Registration Successful!!');
    }
}
