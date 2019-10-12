<?php

namespace App\Http\Controllers\Index;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
use App\Model\Course;
use App\Model\CourseUser;
use App\Model\CourseCategoryModel;
class IndexController extends Controller
{
    //

    //首页操作->课程页面
    public function index()
    {

        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $res=NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        //$user = UserModel::where(['user_id'=>session("user_id")])->first();
        //精品课程   三表联查     用户 user      课程course      课程分类 course_category
        $ress=CourseCategoryModel::
            join("course",['course_category.cate_id'=>'course.cate_id'])
            ->join("course_user",['course.cou_id'=>'course_user.cou_id'])
            ->join("user",['course_user.user_id'=>'user.user_id'])
            ->where(['course_category.status'=>1])
            ->get()->toArray();
        $data = $this->getIndexCateInfo($ress,0);
        // var_dump($data);die;
        return view("index.index",compact('ments','res',"data"));
    }

    // 无限极分类处理数组
    public function getIndexCateInfo($data,$pid=0)
    {
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
}
