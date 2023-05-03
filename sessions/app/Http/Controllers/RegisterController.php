<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return Redirect::route('home');
        }

        return view('register');
    }

    public function save(Request $request)
    {

        DB::insert(
            'insert into users (name, email, password)values (?, ?, ?)',
            [$request->input('name'), $request->input('email'), Hash::make($request->input('password'))]
        );
        return Redirect::route('home');
    }

    public function login()
    {
        if (Auth::check()) {
            return Redirect::route('home');
        }

        return view('login');
    }

    public function log(Request $request)
    {
        Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        session()->regenerate();
        return Redirect::route('home');
    }

    public function dash()
    {

        return view('dashboard');
    }

    public function logout_post()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return Redirect::route('home');
    }
}
