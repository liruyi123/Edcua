<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登陆页面
    public function login()
    {
        return view("login");
    }
    //注册页面
    public function register()
    {
        return view("register");
    }
}
