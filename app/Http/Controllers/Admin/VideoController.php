<?php

namespace App\Http\Controllers\Admin;

use App\Model\Course;
use App\Tools\OSS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OSS\OssClient;
use OSS\Core\OssException;

class VideoController extends Controller
{
    //
    public function video(Request $request)
    {
        $cour = Course::get();
        return view("admin.video.video",compact("cour"));
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
        $res = $oss->putObject($bucket, $object, $content);
        print_r($res['info']['url']);die;
    }
}
