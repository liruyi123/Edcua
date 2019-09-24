<?php

namespace App\Http\Controllers\Admin;

use App\Model\LecturerModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    //讲师添加页面
    public function lecturer()
    {
        return view("admin.lecturer.lecturer");
    }

    //讲师添加操作
    public function lecturerAdd(Request $request)
    {
        $data = $request->data;
        $time = time();
        $data = [
            'lect_name'=>$data['name'],
            "lect_weight"=>$data['ght'],
            "lect_resume"=>$data['resume'],
            "lect_style"=>$data['style'],
            "ctime"=> $time,
            "utime"=>$time,
        ];
        $res = LecturerModel::insert($data);
        var_dump($res);
    }
}
