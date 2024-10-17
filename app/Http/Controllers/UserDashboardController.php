<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserDashboardController extends Controller
{
    public function index() {
        $user = User::all();
        return view('/user/dashboard', compact('user'));
    }
}
