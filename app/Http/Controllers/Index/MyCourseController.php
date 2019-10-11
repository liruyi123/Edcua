<?php

namespace App\Http\Controllers\Index;

use App\Model\QuestionBank;
use App\Model\QuestionBankUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
use App\Model\UserModel;
use App\Model\Collect;
use App\Model\Course;
use App\Model\CourseUser;
use App\Model\Question;
use App\Model\QuestionComment;
use App\Model\Note;

class MyCourseController extends Controller
{
    //  个人中心
    public function index()
    {
        $id = $this->getUserId();
        $collect = Collect::leftjoin('course','course.cou_id','=','collect.cate_id')->where(['is_show'=>1,'user_id'=>$id])->get();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $teach = CourseUser::leftjoin('course','course.cou_id','=','course_user.cou_id')->where(['c_status'=>1,'user_id'=>$id])->get();
        $teachEnd = CourseUser::leftjoin('course','course.cou_id','=','course_user.cou_id')->where(['c_status'=>2,'user_id'=>$id])->get();
        return view('index.mycourse',compact('ments','collect','user','teach','teachEnd'));
    }

    //  移除收藏
    public function colDel(Request $request)
    {
        $id = $request->input('cou_id');
        $del = Collect::where('cate_id',$id)->delete();
        if($del){
            $res = [
                'error' => 10001,
                'msg'   => '移除成功'
            ];
        }else{
            $res = [
                'error' => 20001,
                'msg'   => '移除失败'
            ];
        }
        return json_encode($res);
    }

    //  我的问答
    public function myAsk()
    {
        $id = $this->getUserId();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $ask = Question::where('user_id',$id)->get();
        $test = QuestionComment::leftjoin('question','question.q_id','=','question_comment.q_id')->where('question.user_id',$id)->orderBy('c_id','desc')->limit(3)->get();
//        print_r($test);die;
        return view('index.myask',compact('user','ments','ask','test'));
    }

    // 我的笔记
    public function myNote()
    {
        $id = $this->getUserId();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $note = Note::where('user_id',$id)->get();
        return view('index.mynote',compact('user','ments','note'));
    }

    //  我的作业
    public function myHomework()
    {
        $id = $this->getUserId();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view('index.myhomework',compact('user','ments'));
    }

    //  我的题库
    public function trainingList()
    {
        $id = $this->getUserId();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $data = QuestionBank::join("question_bank_user","question_bank.b_id","question_bank_user.b_id")
            ->where(['question_bank_user.user_id'=>$id])->get()->toArray();

        $num = QuestionBankUser::where(['user_id'=>$id])->count();
        $errorNum = QuestionBankUser::where(['user_id'=>$id,'status'=>1])->count();
        if ($num == 0){
            $num = "您还没有做过任何题目";
        }else{
            $num = number_format($errorNum/$num*100);
        }

        return view('index.training',compact('user','ments','data','num'));
    }

    //  添加笔记
    public function myAdd()
    {
        $id = $this->getUserId();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view('index.myadd',compact('user','ments'));
    }

    //  执行添加笔记
    public function myDo(Request $request)
    {
        $post = $request->input();
        $id = $this->getUserId();
        $add = [
            'note_name' =>  $post['title'],
            'note_content' => $post['count'],
            'is_show'   =>  1,
            'ctime'     =>  time(),
            'user_id'   =>$id
        ];

        $note = Note::insert($add);
        if($note){
            $res = [
                'error' =>  10001,
                'msg'   =>  '请注意查看笔记哟'
            ];
        }else{
            $res = [
                'error' =>  20001,
                'msg'   =>  '请的笔记丢失了哟'
            ];
        }
        return json_encode($res);
    }

    //  用户ID
    public function getUserId()
    {
        return session('user_id');
    }
}
