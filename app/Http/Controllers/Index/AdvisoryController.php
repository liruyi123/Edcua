<?php

namespace App\Http\Controllers\Index;

use App\Model\Consult;
use App\Model\Course;
use App\Model\Navcon;
use App\Model\NavbarModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvisoryController extends Controller
{

    //咨询页面
    public function article()
    {
        $data = Navcon::get();
        $arr = Consult::get();
        $hotask = Consult::where(['navbar_id'=>2])->get();
        $course = Course::get();
        $ments = NavbarModel::where('status',1)->orderBy('nav_weight','desc')->get();
        $res=NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
        return view('index.article',compact('data','arr','hotask','course','ments','res'));
    }
    //咨询详情页面
    public function articlelist(Request $request)
    {
        $id = $request->id;
        $data = Consult::where(['consult_id'=>$id])->first();
        $hotask = Consult::where(['navbar_id'=>2])->get();
        $course = Course::get();
        $ments = NavbarModel::where('status',1)->orderBy('nav_weight','desc')->get();
        return view("index.articlelist",compact('data','hotask','course','ments'));
    }
}
