<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    //讲师页面
    public function teacherlist()
    {
        return view("index.teacherlist");
    }
    //讲师详情页面
    public function teacher()
    {
        return view("index.teacher");
    }
}
