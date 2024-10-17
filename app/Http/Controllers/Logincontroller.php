<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login', [
            'title' => 'MiTour | Login'
        ]);
    }

    public function handle(Request $request) {
        // Validation rules
        $request->validate([
            'email' => ['nullable', 'string', 'email'],
            'username' => ['nullable', 'string'],
            'password' => ['required']
        ], [
            'email' => 'Periksa Email dan Username Anda.',
            'password' => 'Periksa juga Password Anda.'
        ]);

        // Credentials, either email or username
        $credentials = $request->only('password');
        if ($request->filled('email')) {
            $credentials['email'] = $request->email;
        } elseif ($request->filled('username')) {
            $credentials['username'] = $request->username;
        }

        // Attempt to authenticate
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check for successful login
            if ($user) {
                // ROLE
                if ($user->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    // Flash session key for successful login
                    session()->flash('loginSuccess', true);
                    session()->flash('userEmail', $user->email);
                    return redirect()->route('user.dashboard');
                }
            }
        }

        // Redirect with error message on login failure
        return back()->withErrors([
            'LoginFailed' => 'Gagal Login, Pastikan Email/Username dan Password Anda benar.',
        ]);
    }
}
