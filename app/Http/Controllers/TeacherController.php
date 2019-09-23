<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //讲师页面
    public function teacherlist()
    {
        return view("teacherlist");
    }
    //讲师详情页面
    public function teacher()
    {
        return view("teacher");
    }
}
