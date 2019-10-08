<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\Notice;
class NoticeController extends CommonController
{
    //公告的添加静态页面
    public function notice()
    {
        $where=[
            'status'=>1
        ];
        $data=Course::where($where)->get();
        return view('admin.notice.notice',['data'=>$data]);
    }
    //公告的添加执行页面
    public function noticedo(Request $request)
    {
       $cou_id=$request->cou_id;
       $notice_text=$request->notice_text;
       $not_weight=$request->not_weight;
       $where=[
           'cou_id'=>$cou_id,
           'notice_text'=>$notice_text,
           'not_weight'=>$not_weight,
           'ctime'=>time(),
           'status'=>1
       ];
      $data=Notice::insert($where);
      if($data==1){
          echo 200;
      }else{
          echo 500;
      }
    }
    //公告展示列表页面
    public function noticelist()
    {
        $where=[
            'notice.status'=>1
        ];
        $data=Notice::where($where)
            ->orderBy('not_weight','desc')
            ->join('course','notice.cou_id','=','course.cou_id')
            ->paginate(3);
        return view('admin.notice.noticelist',['data'=>$data]);
    }
    //公告的删除页面
    public function ndelete(Request $request)
    {
        $not_id=$request->not_id;
        $where=[
            'not_id'=>$not_id
        ];
        $data=[
            'status'=>2
        ];
        $res=Notice::where($where)->update($data);
        if($res==1){
            echo 200;
        }else{
            echo 500;
        }
    }
    //公告的修改静态页面
    public function nupdate(Request $request)
    {
        $where=[
            'status'=>1
        ];
        $data=Course::where($where)->get();
        $not_id=$request->not_id;
        $where1=[
            'not_id'=>$not_id
        ];
        $res=Notice::where($where1)->first();
       return view('admin.notice.nupdate',['data'=>$data,'res'=>$res]);
    }
    //公告的修改执行页面
    public function nupdatedo(Request $request)
    {
       $not_id=$request->not_id;
       $not_weight=$request->not_weight;
       $notice_text=$request->notice_text;
       $cou_id=$request->cou_id;
       $where=[
           'not_id'=>$not_id
       ];
       $data=[
           'not_weight'=>$not_weight,
           'notice_text'=>$notice_text,
           'cou_id'=>$cou_id,
           'utime'=>time(),
            'status'=>1
       ];
       $res=Notice::where($where)->update($data);
       if($res==1){
           echo 200;
       }else{
           echo 500;
       }
    }
}
