<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function register()
    {
        return view('customer.register', [
            'title' => 'Customer Registration'
        ]);
    }

    public function processRegistration(Request $req)
    {
        $user = new Customer();

        $info = $req->validate([
            'name'      => 'required|max:50',
            'username'  => 'required|unique:customers,username',
            'photo'     => 'required|image|mimes:jpg,png,jpeg',
            'email'     => 'required|email|unique:customers,email',
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



        if ($user->save()) {

            Auth::guard('customer')->login($user);
            return redirect()->route('customer.dashboard')->with('message', 'Registration Successful!!');
        }
    }


    public function login()
    {
        return view('customer.login', [
            'title' => 'Customer Login'
        ]);
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'         => 'required',
            'password'      => 'required',
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('customer.login')->with('invalidPassword', 'Wrong Password');
    }

    public function logout(Request $req)
    {
        Auth::guard('customer')->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('customer.login');
    }


    public function dashboard()
    {
        return view('customer.dashboard', [
            'title' => 'Customer Dashboard'
        ]);
    }
}
