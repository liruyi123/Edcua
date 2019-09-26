<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course;
class NoticeController extends Controller
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
        echo 123;
    }
    //公告展示列表页面
    public function noticelist()
    {
        return view('admin.notice.noticelist');
    }
    //公告的删除页面
    public function ndelete(Request $request)
    {
        echo 1234;
    }
    //公告的修改静态页面
    public function nupdate(Requrest $request)
    {
       return view('admin.notice.nupdate');
    }
    //公告的修改执行页面
    public function nupdatedo(Request $request)
    {
        echo 234;
    }
}
