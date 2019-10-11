<?php

namespace App\Http\Controllers\Index;

use App\Model\CourseCategoryModel;
use App\Model\NavbarModel;
use App\Model\QuestionBank;
use App\Model\QuestionBankUser;
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
                $data = QuestionBank::where(['status'=>1,'cate_id'=>$id])->orderBy('ctime','desc')->get()->toArray();
            }else{
                $data = QuestionBank::where('b_name','like',"%$keywords%")->where(['cate_id'=>$id])->orderBy('ctime','desc')->get()->toArray();
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
        $id = $request->session()->get("user_id");
        if ($id == ""){
            return $this->code(202,"您还没有登陆，请先登录~~");
        }
        $c_answer = $request->input("c_answer");
        $type = $request->input("type");
        $b_id = $request->input("b_id");
        $answer = $request->input("answer");
        $arr = QuestionBank::where(['b_id'=>$b_id])->get()->toArray();
        if ($type == 3){
            if ($c_answer == $arr[0]['b_answer']){
                $data = [
                    'b_id'=>$b_id,
                    'user_id'=>$id,
                    'user_answer'=>$c_answer,
                    'status'=>1,
                ];
                QuestionBankUser::insert($data);
                return $this->code(200,"回答正确","");
            }else{
                $data = [
                    'b_id'=>$b_id,
                    'user_id'=>$id,
                    'user_answer'=>$c_answer,
                    'status'=>2,
                ];
                QuestionBankUser::insert($data);
                return $this->code(201,"回答错误","");
            }
        }else{
            if ($answer == $arr[0]['b_answer']){
                $data = [
                    'b_id'=>$b_id,
                    'user_id'=>$id,
                    'user_answer'=>$answer,
                    'status'=>1,
                ];
                QuestionBankUser::insert($data);
                return $this->code(200,"回答正确","");
            }else{
                $data = [
                    'b_id'=>$b_id,
                    'user_id'=>$id,
                    'user_answer'=>$answer,
                    'status'=>2,
                ];
                QuestionBankUser::insert($data);
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
