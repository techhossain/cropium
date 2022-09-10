<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // $user = request()->user();
        $user = auth()->user();
        $notifications = $user->notifications;

        return view('notifications.index', compact('notifications'));
    }
}
