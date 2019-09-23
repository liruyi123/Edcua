<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{

    //课程详情页面
    public function coursecont()
    {
        return view("coursecont");
    }
    //加入学习页面
    public function study()
    {
        return view("study");
    }
    //开始学习
    public function video()
    {
        return view("video");
    }
}
