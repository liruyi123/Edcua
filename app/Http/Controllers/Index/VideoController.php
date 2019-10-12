<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Model\Catalog;
use App\Model\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function video(Request $request)
    {
        $id = $request->id;
        $cata_id = $request->cata_id;
        $data = Course::where(["course.cou_id"=>$id])->get()->toArray();
        $arr = Catalog::where(["cou_id"=>$id])->get()->toArray();
        $arr = $this->getIndexCateInfo($arr,0);
        $cata = Catalog::where(["pid"=>$cata_id])->first()->toArray();
        $cata = Catalog::where(["pid"=>$cata['cata_id']])->first()->toArray();

        return view("index.video",compact("data","arr","cata"));
    }
    //获取视频
    public function gain(Request $request)
    {
        $cou_id = $request->cou_id;
        $cata_id = $request->cata_id;
        $video = Catalog::where(["cata_id"=>$cata_id])->first()->toArray();
        $data = Course::where(["course.cou_id"=>$cou_id])->get()->toArray();
        $arr = Catalog::where(["cou_id"=>$cou_id])->get()->toArray();
        $arr = $this->getIndexCateInfo($arr,0);
        print_r($arr);die;
        return view("index.video1",compact('video',"data","arr"));
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
