<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Model\NodeModel;
use App\Model\NodeRole;
use App\Model\RoleModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends CommonController
{
    //角色的添加页面
    public function roleadd(){
        $data = NodeModel::get()->toArray();
        $data = $this->getIndexCateInfo($data,0);

        return view("admin.role.roleadd" , ['data'=>$data]);
    }

    // 角色的添加执行
    public function roleadd_do(Request $request){
        $data = $request->input();
//        $id = 1;
        $id = RoleModel::insertGetId(['role_name'=>$data['a_name']]);

        foreach ($data['checked'] as $k=>$v){
            $res = NodeRole::insert(['node_id'=>$v,'role_id'=>$id]);
        }

        return $this->code(200,"创建角色成功");
    }

    // 角色的展示
    public function rolelist(){
        $data = RoleModel::where(['status'=>1])->select()->paginate(5);

        return view("admin.role.rolelist" , ['data'=>$data]);
    }

    // 角色的删除
    public function RoleDel(Request $request){
        $id = $request->input("nid");
        $res = RoleModel::where(['role_id'=>$id])->update(['status'=>2]);
        if ($res == 1){
            return $this->code(200,"删除成功，正在为您刷新页面");
        }else{
            return $this->code(201,"删除失败");
        }
    }

    // 无限极分类处理数组
    function getIndexCateInfo($data,$pid=0){
        $cateInfo=[];
        foreach($data as $k=>$v){
            // print_r($v);
            if($v['pid']==$pid){
                $son=$this->getIndexCateInfo($data,$v['node_id']);
                $v['son']=$son;
                $cateInfo[]=$v;
            }
        }
        return $cateInfo;
    }

}
