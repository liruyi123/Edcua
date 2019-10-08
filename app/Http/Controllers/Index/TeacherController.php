<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LecturerModel;
use App\Model\NavbarModel;
use App\Model\Course;

class TeacherController extends Controller
{
    //讲师页面
    public function teacherlist()
    {
        $data = LecturerModel::where(['status'=>1])->get();
        $ments = NavbarModel::where('status',1)->orderBy('nav_weight','desc')->get();
        return view("index.teacherlist",['data'=>$data,'ments'=>$ments]);
    }
    //讲师详情页面
    public function teacher($lect_id)
    {
        $data = LecturerModel::where(['lect_id'=>$lect_id])->first();
        $res=Course::where(['c_is_show'=>1,'lect_id'=>$lect_id])->get()->toarray();
        $ments = NavbarModel::where('status',1)->orderBy('nav_weight','desc')->get();
        return view("index.teacher",['data'=>$data,'res'=>$res,'ments'=>$ments]);
    }
}
