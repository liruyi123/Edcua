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
        if($res){
            $this->code('10200',"添加成功",$data['lect_name']);
        }else{
            $this->code("10101","添加失败");
        }
    }
    public function code($code="",$msg="",$data=[])
    {
        $data = [
            "code" => $code,
            "message" => $msg,
            "data" => $data
        ];
        echo  json_encode($data,JSON_UNESCAPED_UNICODE);die;
    }
}
