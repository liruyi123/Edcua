<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Model\Course;
use App\Tools\OSS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OSS\OssClient;
use OSS\Core\OssException;
use App\Model\Catalog;
class VideoController extends CommonController
{
    //
    public function video(Request $request)
    {
        $cour = Course::get();
        $cata = Catalog::join('course',"course.cou_id","=","catalog.cou_id")->get()->toArray();
        $cata = $this->getIndexCateInfo($cata,0);
        return view("admin.video.video",compact("cour","cata"));
    }
    //上传视频
    public function videoAdd(Request $request)
    {
        $file = $_FILES['file'];
        //后缀
        $file_suff = explode(".",$file['name'])[1];
        $fileName = "./uploads/video/".date("Ymd",time());
        $tmp_name = $file['tmp_name'];
        if(!is_dir($fileName)){
            mkdir($fileName,777,true);
        }
        $fileNames = $fileName."/".date("Ymd",time()).uniqid().".".$file_suff;
        move_uploaded_file($tmp_name,$fileNames);
        $accessKeyId = env('ACCESSKEYID');
        $accessKeySecret = env("ACCESSKEYSECRET");
        $endpoint = env("ENDPOINT");
        $bucket = env("BUCKET");
        $object = date("Ymd",time()).uniqid().".".$file_suff;
        $content = file_get_contents($fileNames);
        $oss = new OssClient($accessKeyId,$accessKeySecret,$endpoint);
        $res = $oss->putObject($bucket, $object, $content)['info']['url'];
        if(!empty($res)){
            unlink($fileNames);
        }
        $upload = [
            "code" => 0,
            "msg" => "",
            "data" => [
                "src" => $res
            ]
        ];
        echo json_encode($upload,JSON_UNESCAPED_UNICODE);die;
    }

    //上传执行
    public function videoDo(Request $request)
    {
        $id = $request->id;
        $cou_id = $request->cou_id;
        $video = $request->img;
        if($id == 1){
            $res = Course::where(['cou_id'=>$cou_id])->update(['video'=>$video]);
        }elseif($id == 2){
            $res = Catalog::where(["cata_id"=>$cou_id])->update(["video"=>$video]);
        }
        if($res){
            $this->code("200","上传成功");
        }else{
            $this->code("10101","上传失败!");
        }
    }
    //获取类型数据
    public function type(Request $request)
    {
        $type = $request->type;
        if($type ==1){
            $data = Course::get()->toArray();
        }else{
            $data = Catalog::get()->toArray();
            $data = $this->getIndexCateInfo($data,0);
        }
        $this->code("200","OK",$data);
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
