<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user(); // Retrieve the authenticated user
       $Address= $user->address; // Retrieve the user's address from the Address model
        $orders = $user->orders; // Retrieve the user's orders from the Order model
        $location = $user->location; // Retrieve the user's location from the Location model

        return view('profile.user-profile', compact('user','Address','orders','location'));
    }
}
