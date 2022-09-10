<?php

namespace App\Http\Controllers;

use App\Mail\ContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function contact(Request $request)
    {
        $name       = $request->name;
        $email      = $request->email;
        $subject    = $request->subject;
        $message    = $request->message;

        Mail::to($email)->send(new ContactPage($name, $email, $subject, $message));

        return redirect()->route('contact')->with('message', "Contact request send successfully!");;
    }
}
