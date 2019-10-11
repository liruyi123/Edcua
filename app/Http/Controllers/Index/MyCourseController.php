<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
use App\Model\UserModel;
use App\Model\Collect;
use App\Model\Course;

class MyCourseController extends Controller
{
    //  个人中心
    public function index()
    {
        $id = $this->getUserId();
        $collect = Collect::leftjoin('course','course.cou_id','=','collect.cate_id')->where(['is_show'=>1,'user_id'=>$id])->get();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view('index.mycourse',compact('ments','collect','user'));
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
        return view('index.myask',compact('user','ments'));
    }

    // 我的笔记
    public function myNote()
    {
        $id = $this->getUserId();
        $user = UserModel::where(['user_id'=>$id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view('index.mynote',compact('user','ments'));
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
        return view('index.training',compact('user','ments'));
    }

    //  用户ID
    public function getUserId()
    {
        return session('user_id');
    }
}
