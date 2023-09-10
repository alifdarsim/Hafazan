<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Traits\JwtUserAuthTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use JwtUserAuthTrait;

    public function Login(Request $request)
    {
        if ($request->cookie('jwt_token')) return redirect('/home');
        return view('auth.login');
    }

    public function Register(Request $request)
    {
        if ($request->cookie('jwt_token')) return redirect('/home');
        return view('auth.register');
    }

    public function Logout()
    {
        return redirect('/login')->withCookie(cookie()->forget('jwt_token'));
    }

}
