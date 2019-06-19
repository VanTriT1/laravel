<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoyalCustomer;
use Auth;

class UserController extends Controller
{
    
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('loyal_customer')->attempt($arr)) {
            return view('home');
        } else {
            return redirect('/login')->with('msg', 'error');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return view('login');
    }
}
