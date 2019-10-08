<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Model\NodeModel;
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
