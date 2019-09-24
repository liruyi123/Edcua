<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\NavbarModel;
class NavbarController extends Controller
{
    //导航栏添加静态添加页面
    public function navbar()
    {
        return view('admin.navbar.navbar');
    }
    //导航栏添加执行页面
    public function navbardo(Request $request)
    {
       $nav_name=$request->nav_name;
       $nav_url=$request->nav_url;
       $nav_type=$request->nav_type;
       $nav_weight=$request->nav_weight;
        $res=[
            'nav_name'=>$nav_name,
            'nav_url'=>$nav_url,
            'nav_type'=>$nav_type,
            'nav_weight'=>$nav_weight,
            'ctime' => time(),
            'status' => 1
        ];
        $all= NavbarModel::insert($res);
        if($all){
            echo 200;
        }else{
            echo 500;
        }
    }
    //展示导航栏页面
    public function navlist()
    {
        $where=[
            'status'=>1
        ];
        $data=NavbarModel::orderBy('nav_weight','desc')
        ->where($where)
        ->select()
        ->paginate(3);
        return view('admin.navbar.navbarlist',['data'=>$data]);
    }
    //导航栏删除执行
    public function navdelete(Request $request)
    {
        $nav_id=$request->nav_id;
        $where=[
            'nav_id'=>$nav_id
        ];
        $data=[
            'status'=>2
        ];
        $res=NavbarModel::where($where)->update($data);
        if($res){
            echo '<script>alert(\'恭喜您，删除成功！\');</script>';
            header("refresh:1, url='/admin/navbarlist");
            die;
        }else{
            echo "删除失败！";
        }
    }
    //导航栏修改静态页面
    public function navupdate(Request $request)
    {
        $nav_id=$request->nav_id;
        $where=[
            'nav_id'=>$nav_id,
        ];
        $data=NavbarModel::where($where)->first();
        return view('admin.navbar.navupdate',['data'=>$data]);
    }
    //导航栏修改执行页面
    public function navupdatedo(Request $request)
    {
       $nav_id=$request->nav_id;
       $nav_name=$request->nav_name;
       $nav_url=$request->nav_url;
       $nav_type=$request->nav_type;
       $nav_weight=$request->nav_weight;
       $res=[
            'nav_name'=>$nav_name,
            'nav_url'=>$nav_url,
            'nav_type'=>$nav_type,
            'nav_weight'=>$nav_weight,
            'utime' => time(),
            'status' => 1
        ];
        $where=[
            'nav_id'=>$nav_id
        ];
        $data=NavbarModel::where($where)->update($res);
        if($data){
            echo 200;
        }else{
            echo 500;
        }
    }
}
