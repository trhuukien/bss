<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])) {
            return redirect(route('dashboard'));
        } else {
            return redirect()->back()->with('msg', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
    }
}
