<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    //首页操作->课程页面
    public function course()
    {
        return view("courselist");
    }


}
