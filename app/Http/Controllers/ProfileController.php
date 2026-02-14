<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', [
            'user' => Auth::user()
        ]);
    }

    public function showTwoFactor()
    {
        return view('profile.two-factor', [
            'user' => Auth::user()
        ]);
    }
}
