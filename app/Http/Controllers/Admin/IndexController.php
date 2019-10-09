<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Model\AdminRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    //后台首页
    public function index(Request $request)
    {
        $admin_id = $request->session()->get('uid');
//        print_r($admin_id);die;
//        $data = AdminRole::where(['admin_id'=>$admin_id])->first()->toArray();
//        print_r($data);die;

        $data = AdminRole::join("node_role",'admin_role.role_id','=','node_role.role_id')
            ->join('node','node_role.node_id','=','node.node_id')
            ->where(['admin_id'=>$admin_id,'node_show'=>1])
            ->get()->toArray();
        $data = $this->getIndexCateInfo($data,0);


        return view('admin.index',['data' => $data]);
    }
    public function indexV1()
    {
        return view("admin.index_v1");
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
