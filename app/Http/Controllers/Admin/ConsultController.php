<?php

namespace App\Http\Controllers\Admin;

use App\Model\Consult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Navcon;

class ConsultController extends Controller
{
    //  资讯列表页
    public function first()
    {
        $data = Consult::leftjoin('navbar_consult','navbar_consult.navbar_id','=','consult.navbar_id')->orderBy('show','asc')->get();
        return view('admin.consult.first',compact('data'));
    }

    //  资讯添加页
    public function consultAdd()
    {
        $data = Consult::leftjoin('navbar_consult','navbar_consult.navbar_id','=','consult.navbar_id')->where('is_show',0)->orderBy('consult_id','desc')->get();
        return view('admin.consult.addcon',compact('data'));
    }

    //  执行添加资讯
    public function consultDo(Request $request)
    {
        //  接收页面传来的添加数据
        $post = $request->input();
        // print_r($post);
        //  验证是否为空
        if(empty($post['title']) || empty($post['nid']) || empty($post['text'])){
            $res = [
                'error' =>  20001,
                'msg'   =>  '请完善资讯信息'
            ];
            return json_encode($res);
        }

        //  准备资讯添加字段
        $info = [
            'navbar_id' =>  $post['nid'],
            'title'     =>  $post['title'],
            'count'     =>  $post['text'],
            'show'      =>  0,
            'url'       =>  '/admin/consult_url',
            'ctime'     =>  time()
        ];

        //  添加资讯到数据库
        $data = Consult::insert($info);
        if($data){
            $res = [
                'error' =>  10001,
                'msg'   =>  '添加成功'
            ];
        }else{
            $res = [
                'error' =>  20002,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);
    }
}
