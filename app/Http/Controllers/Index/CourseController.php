<?php

namespace App\Http\Controllers\Index;

use App\Model\Catalog;
use App\Model\Course;
use App\Model\CourseComment;
use App\Model\CourseCategoryModel;
use App\Model\NavbarModel;
use App\Model\CourseModel;
use App\Model\LecturerModel;
use App\Model\Notice;
<<<<<<< Updated upstream
use App\Model\UserModel;
=======
use App\Model\Collect;
>>>>>>> Stashed changes
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
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $date=NavbarModel::where(['status'=>1,'nav_type'=>2]) ->orderBy('nav_weight','desc')->get();

        return view("index.courselist",compact("data","res",'ments','date'));
    }
    //课程介绍，目录页面
    public function coursecont(Request $request)
    {
        $id = $request->id;
        $data = Course::where(['course.cou_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $couData = Catalog::where(["cou_id"=>$id])->get()->toArray();
        $res=NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        $countsql=Course::where('status',1)->take(3)->get();
        // print_r($countsql);die;
        $coursesql=Notice::where('status',1)->orderBy('not_weight','desc')->take(2)->get();
        $lectsql=LecturerModel::where('status',1)->take(1)->get();

        $u_id = $this->getUserId();
        $where= [
            'user_id' => $u_id,
            'cate_id'  => $id
        ];
        $collect = Collect::where($where)->first();
        return view("index.coursecont",compact("data","couData","ments","res","countsql","coursesql","lectsql","collect"));
    }
    //课程详情页面
    public function coursecont1(Request $request)
    {
        $id = $request->id;
        $data = Course::join("lecturer",['course.lect_id'=>'lecturer.lect_id'])->where(['cou_id'=>$id])->first()->toArray();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $res=NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        $countsql=Course::where('status',1)->take(3)->get();
        $coursecommentlist=CourseComment::join("user",['course_comment.user_id'=>'user.user_id'])->where('course_comment.status',1)->get();//课程评价展示sql
        return view("index.coursecont1",compact('data',"ments","res","countsql","coursecommentlist"));
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
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $res=NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        return view("index.study",compact('ments','res'));
    }
    //开始学习
    public function video()
    {
        return view("index.video");
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

    public function news(Request $request)
    {
        $id = $request->input('id');
        if($id == ''){
            $data = Course::where(['c_is_show'=>1])->get()->toArray();
        }else{
            $where=[
                'cate_id' => $id,
                'c_is_show' => 1
            ];
            $data = Course::where($where)->get()->toArray();
        }

        $arr = CourseCategoryModel::where(["status"=>1])->get()->toArray();
        $res = $this->getIndexCateInfo($arr,0);
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $eee = NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        return view('index.catanews',compact("data","res",'ments',"eee"));
    }
    //前台课程评论添加
    public function coursecontadd(Request $request)
    {
        $comments=$request->comments;
        $cou_id=$request->cou_id;
        $user_id=$request->session()->get("user_id");
        $data=[
            'c_text'=>$comments,
            'ctime'=>time(),
            'user_id'=>$user_id,
            'cou_id'=>$cou_id,
            'status'=>1
        ];
        $data=CourseComment::insert($data);
        if($data==1){
            echo 200;
        }else{
            echo 500;
        }
    }

    //  用户ID
    public function getUserId()
    {
        return session('user_id');
    }
}
