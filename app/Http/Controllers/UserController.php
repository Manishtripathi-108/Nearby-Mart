<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $Address = $user->address;
        $orders = $user->orders;
        $location = $user->location;

        return view('profile.user-profile', compact('user', 'Address', 'orders', 'location'));
    }
}
