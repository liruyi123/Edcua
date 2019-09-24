<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\RequestMiddleware;
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
    /*
     * 讲师列表
     * */
    public function lecturerList()
    {
        $data = LecturerModel::get();
        for ($i=0;$i<count($data);$i++){
            $data[$i]['ctime'] = date("Y-m-d",$data[$i]['ctime']);
            $data[$i]['utime'] = date("Y-m-d",$data[$i]['utime']);
        }
        return view("admin.lecturer.lecturerList",compact('data'));
    }
    /*
     * 讲师删除操作
     * */
    public function lecturerDel(Request $request)
    {

    }
    /*
     * 讲师列表数据
     * */
//    public function lecturerLists()
//    {
//        $data = LecturerModel::get();
//        for ($i=0;$i<count($data);$i++){
//            $data[$i]['ctime'] = date("Y-m-d",$data[$i]['ctime']);
//            $data[$i]['utime'] = date("Y-m-d",$data[$i]['utime']);
//        }
//        $this->code('200',"OK",$data);
//    }
    /*
     * 状态返回码
     * */
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
