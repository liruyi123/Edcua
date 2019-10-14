<?php

namespace App\Http\Controllers\index;

use App\Model\CourseCategoryModel;
use App\Model\CourseUser;
use App\Model\NavbarModel;
use App\Model\Question;
use App\Model\QuestionComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class FaqController extends Controller
{
    //
    public function Faq(Request $request){

        $id = $request->input("id");
        if ($id != ""){
            $faqdata = Question::join('course','question.cou_id','=','course.cou_id')
                ->join('course_category','course.cate_id','=','course_category.cate_id')
                ->where(['course_category.cate_id'=>$id])->get()->toArray();
        }else{
            $faqdata = Question::join('course','question.cou_id','=','course.cou_id')
                ->join('course_category','course.cate_id','=','course_category.cate_id')
                ->get()->toArray();
        }

        $type = CourseCategoryModel::where(['status'=>1])->get()->toArray();
        $type = $this->getIndexCateInfo($type,0);
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view("index.Faq",['type'=>$type,'ments'=>$ments,'faqdata'=>$faqdata]);
    }

    public function faq_do(Request $request){
        $id = $request->session()->get("user_id");
        if ($id == ""){
            return $this->code(202,"您还没有登陆，请先登录~~");
        }
        $answer = $request->input("c_answer");
        $q_id = $request->input("b_id");
        $data = [
            'c_test'=>$answer,
            'user_id'=>$id,
            'q_id'=>$q_id,
            'ctime'=>time(),
            'utime'=>time(),
            'status'=>1,
        ];
        $res = QuestionComment::insert($data);
        if ($res == 1){
            return $this->code(200,'回答成功，感谢您的参与');
        }else{
            return $this->code(201,'回答失败，稍后尝试');
        }
    }

    // 无限极分类处理数组
    function getIndexCateInfo($data,$pid=0){
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
