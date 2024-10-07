<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // logouts user
        auth()->logout();

        // invalidate existing token
        $request->session()->invalidate();
        // regenerate token
        $request->session()->regenerateToken();

        // redirect back to home page
        return redirect('/');
    }
}