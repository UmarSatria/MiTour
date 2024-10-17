<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function handleRegister(Request $request)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min: 2',
        ], [
            'role' => 'Pilih Role Anda',
            'email' => 'Masukkan Email Anda',
            'username' => 'Masukkan Username Anda',
            'password' => 'Masukkan Password Anda',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash the password
            'role' => $request->role,
        ]);

        if ($user) {
            // Registrasi berhasil, tampilkan SweetAlert success
            return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
        } else {
            // Jika terjadi kesalahan
            return back()->with('error', 'Terjadi kesalahan saat melakukan registrasi.');
        }
    }
}
