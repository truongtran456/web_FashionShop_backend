<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',[
            'title'=> 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email:filter',// khong duoc de trong email
            'password'=> 'required:filter'
        ]);

        if (Auth::attempt([//trong model
            'email' => $request->input(key:'email') ,
            'password' => $request->input(key:'password') //kiem tra xem nhap vao khop vs data khong
        ], $request->input(key:'remember'))){

            return redirect() ->route('admin');//dang nhap xong se chuyen den trang nay (MainController)
        }

        Session::flash('error', 'Email hoac Password khong dung');
        return redirect()->back();

    }
}

