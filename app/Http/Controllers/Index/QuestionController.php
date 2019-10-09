<?php

namespace App\Http\Controllers\Index;

use App\Model\CourseCategoryModel;
use App\Model\NavbarModel;
use App\Model\QuestionBank;
use App\Model\QuestionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    //首页操作->题库页面
    public function question(Request $request)
    {
        $id = $request->input("id");
        $keywords = $request->input("keywords");
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        if ($id != ""){
            if ($keywords != ""){
                $data = QuestionBank::where(['status'=>1,'q_id'=>$id])->orderBy('ctime','desc')->get()->toArray();
            }else{
                $data = QuestionBank::where('b_name','like',"%$keywords%")->where(['q_id'=>$id])->orderBy('ctime','desc')->get()->toArray();
            }
        }else{
            if ($keywords != ""){
                $data = QuestionBank::where('b_name','like',"%$keywords%")->orderBy('ctime','desc')->get()->toArray();
            }else{
                $data = QuestionBank::where(['status'=>1])->orderBy('ctime','desc')->get()->toArray();
            }

        }
        $type = CourseCategoryModel::where(['status'=>1])->get()->toArray();
        $type = $this->getIndexCateInfo($type,0);

        return view("index.question",['ments'=>$ments,'data'=>$data,'type'=>$type]);
    }

    // 题库详情
    public function review(Request $request){
        $data = $request->input();
        $c_answer = $request->input("c_answer");
        $type = $request->input("type");
        $b_id = $request->input("b_id");
        $answer = $request->input("answer");

        $arr = QuestionBank::where(['b_id'=>$b_id])->get()->toArray();
//        print_r($data);die;

        if ($type == 3){
//            echo 1;die;
            if ($c_answer == $arr[0]['b_answer']){
                return $this->code(200,"回答正确","");
            }else{
                return $this->code(201,"回答错误","");
            }
        }else{
//            echo 2;die;
            if ($answer == $arr[0]['b_answer']){
                return $this->code(200,"回答正确","");
            }else{
                return $this->code(201,"回答错误","");
            }
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
