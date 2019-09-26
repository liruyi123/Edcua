<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redis;
use App\Http\Middleware\Session;
use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登陆页面
    public function login()
    {
        return view("admin.login");
    }
    //登陆执行
    public function loginDo(Request $request)
    {
        $name = $request->name;
        $pwd = $request->pwd;
        $data = AdminModel::where(['admin_name'=>$name])->first();
        if(!empty($data)){
            if($data->admin_pwd == $pwd){
                $request->session()->put(["uid"=>$data->admin_id]);
//                Redis::put("uid",$data->admin_id);
                $request->session()->put("uid",$data->admin_id);
                $this->code("200","登陆成功",[$data->admin_name]);
//                dd(session("uid"));
            }else{
                $this->code("10101","登陆失败");
            }
        }else{
            $this->code("10101","用户名或密码错误!");
        }
    }

    //注册页面
    public function register()
    {
        return view("admin.register");
    }
    //注册执行
    public function registerDo(Request $request)
    {
        $name = $request->name;
        $tel = $request->tel;
        $emali = $request->emali;
        $pwd = $request->pwd;
        $pwd1 = $request->pwd1;
        $pwd = encrypt($pwd);
        $time = time();
        $data = AdminModel::where(['admin_name'=>$name])->first();
        $arr = [
            "admin_name" => $name,
            "admin_email" => $emali,
            "admin_tel" => $tel,
            "admin_pwd" => $pwd,
            "ctime" => $time,
            "utime" => $time,
        ];
        if(!empty($data)){
            $this->code("10101","该用户以被注册!");
        }else{
            $res = AdminModel::insert($arr);
            if($res){
                $this->code("200","注册成功",[$name]);
            }else{
                $this->code("10101","注册失败!");
            }
        }
    }
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
