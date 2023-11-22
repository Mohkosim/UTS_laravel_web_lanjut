<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        // Validation logic
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        // Attempt to log in the user
        if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) {
            // Authentication passed
            return redirect()->route('homepage')->with(['success' => 'Login Berhasil']);
        }

        // If login fails, redirect back with an error message
        return back()->withInput()->withErrors(['name' => 'Invalid credentials']);
    }
}
