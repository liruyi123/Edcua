<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Navcon;
use App\Model\Consult;
use App\Model\Course;

class AdvisoryController extends Controller
{

    //咨询页面
    public function article()
    {
        $where = [
            'show'  =>  0,
            'navbar_id' =>  1
        ];
        $nav = Navcon::where('is_show',0)->orderBy('weight','desc')->get();
        $data = Consult::where('show',0)->orderBy('c_time','desc')->get();
        $info = Consult::where($where)->limit(5)->get();
        $cou = Course::where('c_is_show',1)->orderBy('cou_weight','desc')->limit(3)->get();
        return view('index.article',compact('nav','data','info','cou'));
    }
    //咨询详情页面
    public function articlelist()
    {
        return view("index.articlelist");
    }
}
