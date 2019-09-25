<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Question;
class QuestionController extends Controller
{
    //题库添加静态页面
    public function question()
    {
        return view('admin.question.question');
    }
    //题库添加执行页面
    public function questiondo(Request $request)
    {
       $q_name=$request->q_name;
       $q_answer=$request->q_answer;
       $q_weight=$request->q_weight;
       $data=[
            'q_name'=>$q_name,
            'q_answer'=>$q_answer,
            'q_weight'=>$q_weight,
            'ctime'=>time(),
            'status'=>1
       ];
       $res=Question::insert($data);
       if($res){
           echo 200;
       }else{
           echo 500;
       }
    }
    //题库列表展示页面
    public function questionlist(Request $request)
    {
        $where=[
            'status'=>1
        ];
        $data=Question::orderBy('q_weight','desc')
            ->where($where)
            ->select()
            ->paginate(3);
        return view('admin.question.questionlist',['data'=>$data]);
    }
    //题库删除页面
    public function qdelete(Request $request)
    {
        $q_id=$request->q_id;
        $where=[
            'q_id'=>$q_id
        ];
        $data=[
            'status'=>2
        ];
        $res=Question::where($where)->update($data);
        if($res){
            echo '<script>alert(\'恭喜您，删除成功！\');</script>';
            header("refresh:1, url='/admin/questionlist");
            die;
        }else{
            echo '删除失败！';
        }
    }
    //题库修改展示静态页面
    public function qupdate(Request $request){
        return view('admin.question.qupdate');
    }
}
