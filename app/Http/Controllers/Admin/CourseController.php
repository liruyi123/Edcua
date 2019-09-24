<?php

namespace App\Http\Controllers\Admin;

use App\Model\CourseCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //课程分类的添加
    public function courseCategoryAdd(){
        $data = CourseCategoryModel::where(['is_show'=>1,'status'=>1,'pid'=>0])->get()->toArray();
        $data = [
            'data'=>$data
        ];

        return view("admin.course.coursecategoryadd" , $data);
    }

    // 课程分类添加的执行
    public function courseCategoryAdd_do(Request $request){
        $data = $request->input();
//        print_r($data);die;
        $c_name = $data['c_name'];
        $pid = $data['navbar'];
        $weight = $data['c_size'];
        $type = $data['type'];


        $data = [
            'cate_name' => $c_name,
            'pid' => $pid,
            'cate_weight' => $weight,
            'is_show' => $type,
            'utime' => time(),
            'ctime' => time(),
            'status' => 1
        ];
        $res = CourseCategoryModel::insert($data);
        if ($res == 1){
            return [
                'status' => 200,
                'data' => "添加成功了耶！"
            ];
        }else{
            return [
                'status' => 101,
                'data' => "很抱歉，添加失败了。。。"
            ];
        }
    }

    // 课程分类的展示
    public function courseCategoryList(){
        $arr = CourseCategoryModel::where(['status'=>1])->get()->toArray();


        return view("admin.course.coursecategorylist" , ['arr'=>$arr]);
    }

    //课程分类的删除
    public function CCGDel(Request $request){
        $cid = $request->input("cid");
        print_r($cid);
    }
}
