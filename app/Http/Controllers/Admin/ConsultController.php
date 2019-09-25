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
        $data = Consult::leftjoin('navbar_consult','navbar_consult.navbar_id','=','consult.navbar_id')->where('status',0)->orderBy('show','asc')->paginate(10);
        return view('admin.consult.first',compact('data'));
    }

    //  资讯添加页
    public function consultAdd()
    {
        $data = Navcon::where('is_show',0)->get();
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
            'status'    =>  0,
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

    //  资讯修改页
    public function consultUpd($id)
    {
        $data = Consult::where(['consult_id'=>$id])->first();
        $info = Navcon::where(['is_show'=>0])->get();
        return view('admin.consult.updcon',compact('data','info'));
    }

    //  执行资讯修改
    public function consultDoUp(Request $request)
    {
        //  接收页面传来的信息
        $post = $request->input();

        //  非空验证
        if(empty($post['title']) || empty($post['nid']) || empty($post['text'])){
            $res = [
                'error' =>  20001,
                'msg'   =>  '请完善资讯信息'
            ];
            return json_encode($res);
        }

        //  数据库查询数据
        $data = Consult::where('consult_id',$post['id'])->first();

        //  是否更改字段
        if($data['title'] == $post['title'] && $data['count'] == $post['text'] && $data['navbar_id'] == $post['nid'] && $data['show'] == $post['show']){
            $res = [
                'error' =>  20010,
                'msg'   =>  '请更改资讯信息'
            ];
            return json_encode($res);
        }

        //  准备修改数据
        $info = [
            'navbar_id' =>  $post['nid'],
            'title'     =>  $post['title'],
            'count'     =>  $post['text'],
            'show'      =>  $post['show'],
            'ctime'     =>  time()
        ];
        //  修改
        $upd = Consult::where('consult_id',$post['id'])->update($info);
        if($upd){
            $res = [
                'error' =>  10001,
                'msg'   =>  '修改成功'
            ];
        }else{
            $res = [
                'error' =>  20002,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);

    }

    // 删除资讯
    public function consultDel(Request $request)
    {
        $id = $request->input('id');
        $del = Consult::where(['consult_id'=>$id])->update(['status'=>1]);
        if($del){
            $res = [
                'error' =>  10001,
                'msg'   =>  '删除成功'
            ];
        }else{
            $res = [
                'error' =>  20002,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);
    }

    //  资讯导航栏 开始 资讯分类列表页
    public function second()
    {
        return view('admin.consult.second');
    }

    //  资讯分类添加页
    public function barAdd()
    {
        return view('admin.consult.addbar');
    }

    //  资讯分类执行添加
    public function barDo(Request $request)
    {

    }
}
