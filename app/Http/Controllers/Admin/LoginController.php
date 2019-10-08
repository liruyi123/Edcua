<?php

namespace App\Http\Controllers\Admin;

use App\Tools\Smtp;
use App\Http\Middleware\Session;
use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

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
        $time = time();
        if(!empty($data)){
            $id = $data->admin_id;
            $error_num = $data->error_num;
            $error_time = $data->error_time;
            if(decrypt($data->admin_pwd) == $pwd){
                if($error_num >= 3 && ($time-$error_time)<3600){
                    $num = 60-ceil(($time-$error_time)/60);
                    $this->code('10101',"该用户已被锁定，".$num."分钟后登陆!");
                }else{
                    $update = [
                        "error_num" => 0,
                        "error_time" => null,
                    ];
                    AdminModel::where(["admin_id"=>$id])->update($update);
                    $request->session()->put("uid",$data->admin_id);
                    $this->code("200","登陆成功",[$data->admin_name]);
                }
            }else{
                if($time - $error_time > 3600){
                    $update = [
                        "error_num" => 1,
                        "error_time" => $time,
                    ];
                    AdminModel::where(["admin_id"=>$id])->update($update);
                    $this->code("10101","密码错误！您还有两次机会登陆!");
                }else{
                    if($error_num >= 3){
                        $num = 60-ceil(($time-$error_time)/60);
                        $this->code("10101","该用户已被锁定，".$num."分钟后重新登陆!");
                    }else{
                        $update = [
                            "error_num" => $error_num+1,
                            "error_time" => $error_time,
                        ];
                        AdminModel::where(["admin_id"=>$id])->update($update);
                        $num = 3-($error_num+1);
                        $this->code("10101","密码错误！您还有".$num."次登陆机会！");
                    }
                }
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
    //忘记密码页面
    public function forgetpwd(Request $request)
    {
        return view("admin.forgetpwd.forgetpwd");
    }
    //密码修改执行
    public function userFindPwd(Request $request)
    {
        $name = $request->name;
        $code = $request->code;
        $email = $request->email;
        $pwd = $request->pwd;
        $pwd1 = $request->pwd1;
        $time = time();
        $data = AdminModel::where(['admin_name'=>$name])->first();
        if(!empty($data)){
            $ema = Cookie::get("email");
            $codes = Cookie::get("code");
            if(!empty($ema)){
                if($email == $ema){
                    if(!empty($codes)){
                        if($code == $codes){
                            $pwd = encrypt($pwd);
                            $arr = [
                                "admin_name" => $name,
                                "admin_pwd"  => $pwd,
                                "admin_email" => $email,
                                "utime" => $time,
                            ];
                            $res = AdminModel::where(["admin_name"=>$name])->update($arr);
                            if($res){
                                $this->code("200","OK");
                            }else{
                                $this->code("10101","SUCCESS");
                            }
                        }else{
                            $this->code("10101","验证码错误或已失效，请重新获取！");
                        }
                }else{
                        $this->code("10101","验证码错误或已失效，请重新获取！");
                    }
                }else{
                    $this->code("10101","邮箱有误，和原邮箱不一致!");
                }
            }else{
                $this->code("10101","邮箱有误，请重新输入!");
            }
        }else{
            $this->code("10101","修改失败!");
        }
    }
    //获取验证码
    public function codes(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $data = AdminModel::where(["admin_name"=>$name,"admin_email"=>$email])->first();
        if($data){
            $arr = rand(11111,99999);
            Cookie::queue("code",$arr,1);
            Cookie::queue("email",$email);
            $this->email($email,$arr);
        }else{
            $this->code("10101","该用户不存在！");
        }
    }
    //发送验证码
    public function email($email,$arr)
    {
        $smtpserver = "ssl://smtp.qq.com";//SMTP服务器  其他的写stmp.xx.com就好了，QQ的不行，加了ssl://才可以
        $smtpserverport =465;//SMTP服务器端口
        $smtpusermail = "1446535591@qq.com";//SMTP服务器的用户邮箱
        $smtpemailto = $email;//发送给谁
        $smtpuser = "1446535591@qq.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
        $smtppass = "gvrxolimncczjgaf";//SMTP服务器的用户密码
        $mailtitle = "验证码";//邮件主题
        $mailcontent = "<h1>$arr</h1>";//邮件内容
        $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
        $smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp->debug = false;//是否显示发送的调试信息
        $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
        if($state==""){
            echo "error";
            echo "<a href='/admin/register'>点此返回</a>";
            exit();
        }else{
            $this->code("200","OK");
        }
    }
    //状态返回码
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
