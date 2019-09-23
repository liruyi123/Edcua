<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    //课程详情页面
    public function coursecont()
    {
        return view("index.coursecont");
    }
    //加入学习页面
    public function study()
    {
        return view("index.study");
    }
    //开始学习
    public function video()
    {
        return view("index.video");
    }
}
