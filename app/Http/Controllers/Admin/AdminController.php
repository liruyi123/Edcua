<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Model\AdminModel;
use App\Model\AdminRole;
use App\Model\RoleModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends CommonController
{
    // 管理员添加页面
    public function adminadd(){
        $data = RoleModel::where(['status'=>1])->get()->toArray();
        return view("admin.admin.adminadd" , ['data'=>$data]);
    }

    // 管理员添加执行
    public function adminadd_do(Request $request){
        $name = $request->input("a_name");
        $email = $request->input("a_email");
        $tel = $request->input("a_tel");
        $pwd = encrypt($request->input("a_pwd"));
        $role_id = $request->input("role");
        if (empty($name) || empty($email) || empty($tel) || empty($pwd) ){
            return $this->code(201,"请完善信息");
        }
        if (strlen($tel) != 11){
            return $this->code(201,"手机号的位数为11位");
        }
        $data = [
            "admin_name" => $name,
            "admin_pwd" => $pwd,
            "admin_email" => $email,
            "admin_tel" => $tel,
            "ctime" =>time(),
            "utime" => time(),
            "status" => 1
        ];
        $id = AdminModel::insertGetId($data);

        $res = AdminRole::insert(['role_id'=>$role_id,'admin_id'=>$id]);

        if ($res == 1){
            return $this->code(200,"添加成功，正在为您跳转到展示页面");
        }else{
            return $this->code(201,"添加失败");
        }
    }

    // 管理员展示页面
    public function adminlist(){

        $data = AdminModel::where(['status' => 1])->select()->paginate(5);
//        print_r($data);die;
        return view("admin.admin.adminlist", ['data'=>$data]);
    }
}
