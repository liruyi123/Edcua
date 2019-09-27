<?php

namespace App\Http\Controllers\Admin;

use App\Model\Catalog;
use App\Model\QuestionBank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Question;
use vendor\project\StatusTest;

class QuestionController extends Controller
{
    //题库添加静态页面
    public function question()
    {
        $info = Catalog::where(['show'=>1])->get()->toArray();
        $data = $this->getIndexCateInfo($info,0,0);
        return view('admin.question.question',['data'=>$data]);
    }

    //题库添加执行页面
    public function question_do(Request $request)
    {
       $topic = $request -> input('topic');
       $catalog = $request -> input('catalog');
       $choiceA = $request -> input('choiceA');
       $choiceB = $request -> input('choiceB');
       $choiceC = $request -> input('choiceC');
       $choiceD = $request -> input('choiceD');
       $choice_answer = $request -> input('choice_answer');
       $type = $request -> input('type');
       $score = $request -> input('score');
       $cloze_answer = $request -> input('cloze');
       $TF_answer = $request -> input('TF');
       if (empty($topic) || empty($score) || $type == 0){
           return $this->code(201,"请完善信息" ,"");
       }

       // 判断题目的类型
       if ($type == 1){
           // 判断题
           if (empty($TF_answer)){
               return $this->code(201,"真确答案不能为空" ,"");
           }

           $data = [
               'b_name'=>$topic,
               'b_type' => $type,
               'cata_id' => $catalog,
               'b_answer' => $TF_answer,
               'b_score' => $score,
               'ctime' => time(),
               'utime' => time()
           ];
       }elseif ($type == 2){
           // 选择题
           if (empty($choiceA) || empty($choiceB) || empty($choiceC) || empty($choiceD) || empty($choice_answer)){
               return $this->code(201,"请完善信息" ,"");
           }
           $data = [
               'b_name'=>$topic,
               'b_type' => $type,
               'cata_id' => $catalog,
               'b_choiceA' => $choiceA,
               'b_choiceB' => $choiceB,
               'b_choiceC' => $choiceC,
               'b_choiceD' => $choiceD,
               'b_answer' => $choice_answer,
               'b_score' => $score,
               'ctime' => time(),
               'utime' => time()
           ];
       }else if ($type == 3){
           // 回答题
           if (empty($cloze_answer)){
               return $this->code(201,"真确答案不能为空" ,"");
           }
           $data = [
               'b_name'=>$topic,
               'b_type' => $type,
               'cata_id' => $catalog,
               'b_answer' => $cloze_answer,
               'b_score' => $score,
               'ctime' => time(),
               'utime' => time()
           ];
       }
        $res = QuestionBank::insert($data);
        if ($res == 1){
            return $this->code(200,"添加成功","");
        }else{
            return $this->code(200,"很抱歉，添加失败了。。。","");
        }

    }

    //题库列表展示页面
    public function questionlist(Request $request)
    {
        $TFdata = QuestionBank::leftjoin('catalog','question_bank.cata_id','=','catalog.cata_id')->where(['question_bank.status'=>1,'b_type'=>1])->paginate(3);

        $choicedata = QuestionBank::leftjoin('catalog','question_bank.cata_id','=','catalog.cata_id')->where(['question_bank.status'=>1,'b_type'=>2])->paginate(3);

        $clozedata = QuestionBank::leftjoin('catalog','question_bank.cata_id','=','catalog.cata_id')->where(['question_bank.status'=>1,'b_type'=>3])->paginate(3);

        $data = QuestionBank::leftjoin('catalog','question_bank.cata_id','=','catalog.cata_id')->where(['question_bank.status'=>1])->paginate(3);

//        print_r($data);die;
        return view('admin.question.questionlist',['TFdata'=>$TFdata,'choicedata'=>$choicedata,'clozedata'=>$clozedata,'data'=>$data]);
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

    // 无限极分类处理数组
    function getIndexCateInfo($data,$pid=0){
        $cateInfo=[];
        foreach($data as $k=>$v){
            // print_r($v);
            if($v['pid']==$pid){
                $son=$this->getIndexCateInfo($data,$v['cata_id']);
                $v['son']=$son;
                $cateInfo[]=$v;
            }
        }
        return $cateInfo;
    }

}
