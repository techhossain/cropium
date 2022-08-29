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
        // $user = new User();

        $info = $req->validate([
            'name'      => 'required|max:50',
            'username'  => 'required|unique:users,username',
            'photo'     => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
        ]);

        // $user = User::create($info);


        // $user = $this->createUser($info);

        if ($user = User::create($info)) {
            // Auth::attempt($info);
            Auth::login($user);
            return redirect('/dashboard')->with('message', 'Registration Successful!!');
        }



        // $user = User::create([
        //     'name'      => $req->name,
        //     'username'  => $req->username,
        //     'photo'     => $req->photo,
        //     'email'     => $req->email,
        //     'password'  => bcrypt($req->password),
        // ]);

        // $user->name     = $req->name;
        // $user->username = $req->username;
        // $user->photo    = $req->photo;
        // $user->email    = $req->email;
        // $user->password = bcrypt($req->password);

        // $user->save();
    }

    // public function createUser($user)
    // {
    //     return User::create([
    //         'name'      => $user['name'],
    //         'username'  => $user['username'],
    //         'photo'     => $user['photo'],
    //         'email'     => $user['email'],
    //         'password'  => bcrypt($user['password']),
    //     ]);
    // }

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
