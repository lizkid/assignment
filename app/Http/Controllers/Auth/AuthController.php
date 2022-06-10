<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            return redirect('/cargo');
        }

        return view('login.index');
    }

    public function save(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        try {

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

        catch (\Throwable $exception)
        {
            Log::error($exception);

            Session::flash('alert-danger', 'Internal server error');
            return back();

        }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        Session::flash('alert-success', 'logout successfully');
        return redirect('/');


    }
}
