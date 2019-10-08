<?php

namespace App\Http\Controllers\Index;

use App\Model\Course;
use App\Model\CourseCategoryModel;
use App\Model\CourseModel;
use App\Model\LecturerModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //课程首页
    public function course(Request $request)
    {
        $data = Course::get();
        $arr = CourseCategoryModel::where(["status"=>1])->get()->toArray();
        $res = $this->getIndexCateInfo($arr,0);
        return view("index.courselist",compact("data","res"));
    }
    //课程详情页面
    public function coursecont(Request $request)
    {
        $id = $request->id;
        $data = Course::where(['cou_id'=>$id])->get()->toArray();
        return view("index.coursecont",compact("data"));
    }
    //获取讲师信息
    public function lect(Request $request)
    {
        $id = $request->lect_id;
        $data = LecturerModel::where(['lect_id'=>$id])->first();
        $this->code("",'',$data);
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

    // 无限极分类处理数组
    public function getIndexCateInfo($data,$pid=0){
        $cateInfo=[];
        foreach($data as $k=>$v){
            // print_r($v);
            if($v['pid']==$pid){
                $son=$this->getIndexCateInfo($data,$v['cate_id']);
                $v['son']=$son;
                $cateInfo[]=$v;
            }
        }
        return $cateInfo;
    }
    // 返回的数据格式
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
