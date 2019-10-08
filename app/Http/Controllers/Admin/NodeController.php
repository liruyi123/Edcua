<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Model\NodeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends CommonController
{
    // 节点的添加页面
    public function nodeadd(){
        $data = NodeModel::get()->toArray();
        $data = $this->getIndexCateInfo($data,0);
//        print_r($data);die;
        return view("admin.node.nodeadd",['data'=>$data]);
    }

    // 节点的添加执行
    public function nodeadd_do(Request $request){
        $name = $request->input("a_name");
        $url = $request->input("a_url");
        $pid = $request->input("pid");
        $type = $request->input("type");

        if (empty($name)){
            return $this->code(201,"请完善信息");
        }

        $data = [
            'node_name' => $name,
            'node_url' => $url,
            'pid' => $pid,
            'node_show' => $type,
        ];
        $res = NodeModel::insert($data);
        if ($res == 1){
            return $this->code(200,"添加成功，正在为您跳转到展示页面");
        }else{
            return $this->code(201,"添加失败");
        }
    }

    // 节点展示页面
    public function nodelist(){
        $data = NodeModel::select()->paginate(3);
//        print_r($data);die;
        return view("admin.node.nodelist" , ['data' => $data] );
    }

    // 节点删除
    public function NodeDel(Request $request){
        $nid = $request->input("nid");
        $arr = NodeModel::where(['node_id'=>$nid])->first();
        if ($arr['node_show'] == 1){
            $res = NodeModel::where(['node_id'=>$nid])->update(['node_show'=>2]);
        }else{
            $res = NodeModel::where(['node_id'=>$nid])->update(['node_show'=>1]);
        }
        if ($res == 1){
            return $this->code(200,"修改成功，正在为您刷新页面");
        }else{
            return $this->code(201,"修改失败");
        }

    }

    // 节点修改页面
    public function NodeUpd(Request $request){
        $nid = $request->input("id");
        $arr = NodeModel::where(['node_id'=>$nid])->first();
        // 下拉菜单所有节点
        $data = NodeModel::where(['node_show' => 1])->get()->toArray();
        $data = $this->getIndexCateInfo($data,0);

        return view("admin.node.nodeupd",['data'=>$data,'arr'=>$arr]);
    }
    public function NodeUpd_do(Request $request){
        $nid = $request->input("a_id");
        $name = $request->input("a_name");
        $url = $request->input("a_url");
        $pid = $request->input("pid");
        $type = $request->input("type");

        $data = [
            'node_name'=>$name,
            'node_url'=>$url,
            'pid'=>$pid,
            'node_show'=>$type,
        ];

        $res = NodeModel::where(['node_id'=>$nid])->update($data);
        if ($res == 1){
            return $this->code(200,"修改成功，正在为您跳转到展示页面");
        }else{
            return $this->code(201,"修改失败");
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
