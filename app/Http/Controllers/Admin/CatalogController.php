<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Catalog;
use App\Model\Course;


class CatalogController extends Controller
{
    //  目录展示页
    public function catalog()
    {
        $data = Catalog::leftjoin('course','course.cou_id','=','catalog.cou_id')->where('show',1)->orderBy('pid','asc')->get();
        return view('admin.catalog.first',compact('data'));
    }

    //  目录添加页
    public function catalogAdd()
    {
        $data = Course::where('status',1)->get();
        $info = Catalog::where(['show'=>1])->get()->toArray();
        $a = $this->getIndexCateInfo($info,0,0);
        return view('admin.catalog.addcata',compact('data','info','a'));
    }

    //  执行添加目录
    public function catalogDo(Request $request)
    {
        $post = $request->input();
        //  验证非空
        if(empty($post['text']) || empty($post['c_name'])){
            $res = [
                'error' =>  20001,
                'msg'   =>  '请完善资讯信息'
            ];
            return json_encode($res);
        }

        //  准备添加数据
        $data = [
            'cou_id'    =>  $post['cou_id'],
            'cata_name' =>  $post['c_name'],
            'cata_text' =>  $post['text'],
            'pid'       =>  $post['pid'],
            'show'      =>  1,
            'c_time'     =>  time()
        ];

        //  添加入库
        $add = Catalog::insert($data);
        if($add){
            $res = [
                'error' =>  10001,
                'msg'   =>  '添加成功'
            ];
        }else{
            $res = [
                'error' =>  20002,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);
    }

    //  目录修改页
    public function catalogUpd($id)
    {
        $info = Course::where(['status'=>1])->get();
        $a = Catalog::where(['cata_id'=>$id])->get()->toArray();
        $b = Catalog::where(['show'=>1])->get()->toArray();
        $data = $this->getIndexCateInfo($b,0);
        return view('admin.catalog.updcata',compact('info','data','a'));
    }

    //  执行修改
    public function catalogUpdDo(Request $request)
    {

    }

    //  删除
    public function catalogDel(Request $request)
    {
        $id = $request->input('id');
        $upd = ['show'  =>  2];
        $data = Catalog::where(['cata_id'=>$id])->update($upd);
        if($data){
            $res = [
                'error' => 10001,
                'msg'   => '删除成功'
            ];


        }else{
            $res = [
                'error' =>  20002,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);
    }

    // 无限极分类处理数组
    function getIndexCateInfo($data,$pid=0){
        $cateInfo=[];
        foreach($data as $k=>$v){
            // print_r($v);
            if($v['pid']==$pid){
                $son=$this->getIndexCateInfo($data,$v['cata_id']);
                $v['son']=$son;
                $cateInfo[]=$v;
            }
        }
        return $cateInfo;
    }

}
