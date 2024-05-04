<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        $userDetail = $user->userDetail; // Retrieve the user's details from the UserDetail model

        return view('profile.user-profile', compact('user', 'userDetail'));
    }
}
