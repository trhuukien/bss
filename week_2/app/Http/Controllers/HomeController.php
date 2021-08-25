<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function setting()
    {
        $user = User::find(Auth::user()->id);
        return view('setting', compact('user'));
    }

    public function postSetting(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                "avatar" => [
                    'mimes:jpg,png'
                ],
            ],
            [
                'name.required' => 'Hãy nhập vào tên hiển thị!',
                "avatar.mimes" => 'Định dạng hợp lệ: jpg, png!',
            ]
        );

        $user = User::find(Auth::user()->id);

        if (!$user) {
            return redirect()->back();
        }
        $user->name = $req->name;

        if ($req->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $req->avatar->getClientOriginalName();
            $path = $req->avatar->storeAs('public/uploads/', $newFileName);
            $user->avatar = str_replace('public/', '', $path);
        }

        $user->save();

        return redirect(route('setting'));
    }
}
