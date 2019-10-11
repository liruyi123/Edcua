<?php

namespace App\Http\Controllers\Index;

use App\Model\NavbarModel;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdMessageController extends Controller
{
    //
    public function updMessage(Request $request){
        $user_id = $request->session()->get("user_id");
        $user = UserModel::where(['user_id'=>$user_id])->first();
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view("index.updmessage",compact('user','ments'));
    }

    public function updMessagedo(Request $request){
        $email = $request->input("email");
        $name = $request->input("name");
        $imgs = $request->input("imgs");
        $user_id = $request->input("user_id");
//        $nameArr = UserModel::where(['user_name'=>$name])->first();
//        print_r($nameArr);die;
//        $emailArr = UserModel::where(['user_email'=>$email])->first();
//        if ($nameArr != ""){
//            return $this->code(202,"该用户名称已存在");
//        }
//        if ($emailArr != ""){
//            return $this->code(202,"该邮箱已存在");
//        }

        $data = [
            'user_name'=>$name,
            'user_email'=>$email,
            'user_image'=>$imgs,
        ];
        $res = UserModel::where(['user_id'=>$user_id])->update($data);
        if ($res == 1){
            return $this->code(200,"修改信息成功");
        }else{
            return $this->code(202,"修改信息失败");
        }
    }
    // 头像上传
    public function uploadinfo(){
        $info=$_FILES['file'];
        // print_r($info);die;
        $tmp_name=$info['tmp_name'];
        $img=file_get_contents($tmp_name);
        $name="./admin/uploads/".$info['name'];
        file_put_contents($name,$img,FILE_APPEND);
        $name = ltrim($name,'.');
        echo json_encode(['code'=>1,'msg'=>$name]);

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
