<?php

namespace App\Http\Controllers;

use App\Mail\Payment;
use App\Mail\PaymentReceived;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function index()
    {
        return view('payment.index');
    }

    public function send_payment()
    {
        // Mail::raw('Payment Processed successfully', function ($msg) {
        //     $msg->to('maherdu10@gmail.com');
        //     $msg->subject('Payment Processing');
        // });

        $user = User::find(1);

        // Mail::to($user)->send(new Payment(50));
        Mail::to($user)->send(new PaymentReceived(50));
    }
}
