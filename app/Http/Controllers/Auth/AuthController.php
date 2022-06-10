<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function save(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username'=>$username, 'password'=>$password]))
        {
            $request->session()->regenerate();

            Session::flash('alert-success', 'successfully login');
            return redirect('/cargo');
        }

        else
        {
            Session::flash('alert-danger', 'Wrong username or password');
            return back();
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();


    }
}