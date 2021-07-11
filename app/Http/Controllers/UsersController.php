<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications()
    {
        //mark notification as reaf
        auth()->user()->unreadNotifications->markAsRead();

        return view('users.notifications', [
            'notifications' => auth()->user()->notifications()->paginate(5)
        ]);
    }
}
