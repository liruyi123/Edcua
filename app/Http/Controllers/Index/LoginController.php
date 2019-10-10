<?php

namespace App\Http\Controllers\Index;


use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
use OSS\OssClient;

class LoginController extends Controller
{
    //登陆页面
    public function login()
    {
//        $accessKeyId = env('ACCESSKEYID');
//        $accessKeySecret = env("ACCESSKEYSECRET");
//        $endpoint = env("ENDPOINT");
//        $bucket = env("BUCKET");
//        $object = "a.jpg";
//        $fileName = "./uploads/20190926/201909265d8c814b29ecd.jpg";
//        $content = file_get_contents($fileName);
//        $oss = new OssClient($accessKeyId,$accessKeySecret,$endpoint);
//        $ass = $oss->putObject($bucket,$object,$content);
//        print_r($ass);die;
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view("index.login",compact("ments"));
    }
    //登陆执行
    public function loginAdd(Request $request)
    {
        $name = $request->name;
        $pwd = $request->pwd;
        $int = $request->int;
        $data = UserModel::where(["user_name"=>$name])->first();
        if(!empty($data)){
            $id = $data->user_id;
            $error_num = $data->error_num;
            $error_time = $data->error_time;
            $time = time();
            if(decrypt($data->user_pwd) == $pwd){
                //密码正确
                if($error_num >= 3 && ($time-$error_time)<3600){
                    //错误三次
                    $num = 60-ceil(($time-$error_time)/60);
                    $this->code("10101","该用户已被锁定，".$num."分钟后登陆！");
                }else{
                    //错误小于三次
                    $update = [
                        "error_num" => 0,
                        "error_time" => null,
                    ];
                    UserModel::where(["user_id"=>$id])->update($update);
                    if($int == 1){
                        $request->session()->put("password",$pwd);
                    }
                    $request->session()->put("user_id",$id);
                    $this->code("200","登陆成功",[$name]);
                }
            }else{
                //密码错误
                if($time-$error_time > 3600){
                    $updates = [
                        "error_num" => 1,
                        "error_time" => $time,
                    ];
                    UserModel::where(['user_id'=>$id])->update($updates);
                    $this->code("10101","密码错误！还有两次机会登陆！");
                }else{
                    if($error_num >=3){
                        $num = 60-ceil(($time-$error_time)/60);
                        $this->code("10101","该用户已被锁定，".$num."分钟后登陆！");
                    }else{
                        $updates = [
                            "error_num" => $error_num+1,
                            "error_time" => $error_time,
                        ];
                        UserModel::where(["user_id"=>$id])->update($updates);
                        $nu = 3-($error_num+1);
                        $this->code("10101","密码错误！还有".$nu."机会登陆！");
                    }
                }
                $this->code("10101","密码有误！");
            }

        }else{
            $this->code("10101","该用户不存在！");
        }
    }
    //注册页面
    public function register()
    {
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view("index.register",compact("ments"));
    }
    //注册执行
    public function registerAdd(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $pwd = $request->pwd;
        $pwd = encrypt($pwd);
        $pwd1 = $request->pwd1;
        $time = time();
        $image = "/uploads/20190926/201909265d8c814b29ecd.jpg";
        $data = UserModel::where(['user_name'=>$name])->first();
        if(empty($data)){
            $arr = [
                "user_email" => $email,
                "user_name" => $name,
                "user_pwd" => $pwd,
                "user_image" => $image,
                "ctime" => $time,
                "utime" => $time,
            ];
            $res = UserModel::insert($arr);
            if($res){
                $this->code("200","注册成功",[$name]);
            }else{
                $this->code("10101","注册失败！");
            }
        }else{
            $this->code("10101","该用户已存在!");
        }
    }
    //头像上传
    public function uploads(Request $request)
    {
        $accessKeyId = env('ACCESSKEYID');
        $accessKeySecret = env("ACCESSKEYSECRET");
        $endpoint = env("ENDPOINT");
        $bucket = env("BUCKET");
        $file = $request->file("file");
        $tmppath = $file->getRealPath();
        $file_suff = explode(".",$file['name'])[1];
        $object = date("Ymd",time()).".".$file_suff;

//        $fileName = $file['name'];
//        $content = file_get_contents($fileName);
//        $oss = new OssClient()
        $oss = new OssClient($accessKeyId,$accessKeySecret,$endpoint);
//        $ass = $oss->publicup
        $ass = $oss->putObject($bucket,$object,$tmppath);
        print_r($ass);die;
    }

    /*
     * 状态返回码
     * */
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
