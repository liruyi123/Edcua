<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登陆页面
    public function login()
    {
        return view("index.login");
    }
    //注册页面
    public function register()
    {
        return view("index.register");
    }
}
