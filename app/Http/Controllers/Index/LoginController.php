<?php

namespace App\Http\Controllers\Index;


use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
use OSS\OssClient;
use Illuminate\Support\Facades\Cookie;
use App\Tools\Smtp;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    //登陆页面
    public function login(Request $request)
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
        $password = $request->session()->get("password");
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $eee = NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        return view("index.login",compact("ments","eee","password"));
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
                    }else{
                        $request->session()->forget('password');
                    }
                    $request->session()->put("user_id",$id);
                    $request->session()->put("user_name",$name);
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
        $eee = NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        return view("index.register",compact("ments","eee"));
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

    //修改密码页面
    public function pwd(Request $request)
    {
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view("index.pwd",compact("ments"));
    }
    //修改密码执行
    public function pwdAdd(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $code = $request->code;
        $pwd = $request->pwd;
        $pwd1 = $request->pwd1;
        $data = UserModel::where(["user_name"=>$name])->first();
        if(!empty($data)){
            if($email == Redis::get("index_email")){
                if($code == Redis::get("index_code")){
                    $pwd = encrypt($pwd);
                    $res = UserModel::where(["user_name"=>$name])->update(["user_pwd"=>$pwd]);
                    if($res){
                        $this->code("200","修改成功");
                    }else{
                        $this->code("10101","修改失败!");
                    }
                }elseif(Redis::get("index_code") == ""){
                    $this->code("10101","验证码已过期请重新获取！");
                }else{
                    $this->code("10101","验证码有误，请仔细查看！");
                }
            }else{
                $this->code("10101","邮箱有误，请重新输入！");
            }
        }else{
            $this->code("10101","该用户不存在！");
        }
    }
    //获取验证码
    public function pwdCode(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $data = UserModel::where(["user_name"=>$name])->first();
        if(!empty($data)){
            $rand = rand(11111,99999);
            Redis::setex("index_code",60,$rand);
            Redis::set("index_email",$email);
            $this->email($email,$rand);

        }else{
            $this->code("10101","昵称输入有误！");die;
        }
    }

    //发送验证码
    public function email($email,$code)
    {
        $smtpserver = "ssl://smtp.qq.com";//SMTP服务器  其他的写stmp.xx.com就好了，QQ的不行，加了ssl://才可以
        $smtpserverport =465;//SMTP服务器端口
        $smtpusermail = "1446535591@qq.com";//SMTP服务器的用户邮箱
        $smtpemailto = $email;//发送给谁
        $smtpuser = "1446535591@qq.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
        $smtppass = "gvrxolimncczjgaf";//SMTP服务器的用户密码
        $mailtitle = "验证码";//邮件主题
        $mailcontent = "<h1>$code</h1>";//邮件内容
        $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
        $smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp->debug = false;//是否显示发送的调试信息
        $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
        if($state==""){
            echo "error";
            echo "<a href='/admin/register'>点此返回</a>";
            exit();
        }else{
            $this->code("200","OK");die;
        }
    }
    //退出
    public function exit(Request $request)
    {
        $res = $request->session()->flush();
        $this->code("200","退出成功");
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
        echo  json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}
