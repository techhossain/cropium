<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user->password = bcrypt($req->password);



        if ($user->save()) {

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

    public function processLogin(Request $req)
    {
        $info = $req->validate([
            'email' => 'required|email|exists:users,email',
            'password'  => 'required|min:6'
        ]);

        if (Auth::attempt($info)) {
            $req->session()->regenerate();
            return redirect('dashboard');
        } else {
            return redirect('login')->with('invalidPassword', 'Wrong Password');
        }

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
}
