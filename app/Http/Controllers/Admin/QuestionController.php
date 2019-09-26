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
    public function qupdate(Request $request)
    {
        $q_id=$request->q_id;
        $where=[
            'q_id'=>$q_id
        ];
        $data=Question::where($where)->first();
        return view('admin.question.qupdate',['data'=>$data]);
    }
    //题库修改执行页面
    public function qupdatedo(Request $request)
    {
        $q_id=$request->q_id;
        $q_name=$request->q_name;
        $q_answer=$request->q_answer;
        $q_weight=$request->q_weight;
        $data=[
             'q_name'=>$q_name,
             'q_answer'=>$q_answer,
             'q_weight'=>$q_weight,
             'utime'=>time(),
        ];
        $where=[
            'q_id'=>$q_id
        ];
        $res=Question::where($where)->update($data);
        if($res==1){
            return $this->code(200,"恭喜您，修改成功！","");
       }else{
            return $this->code(500,"很遗憾，修改失败！","");
       }
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
