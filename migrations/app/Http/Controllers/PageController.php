<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function log(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $name = $request->input('name');
        $request->session()->put('name', $name);
        return redirect()->route('about');
    }

    public function about(Request $request)
    {
        if ($request->session()->has('name'))
            return view('about', ['name' => $request->session()->get('name')]);


        else
            return view('about');
    }

    public function hobbies(Request $request)
    {
        if ($request->session()->has('name'))
            return view('hobbies', ['name' => $request->session()->get('name')]);
        else
            return view('hobbies');
    }
}
