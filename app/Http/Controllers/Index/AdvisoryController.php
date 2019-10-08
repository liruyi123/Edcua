<?php

namespace App\Http\Controllers\Index;

use App\Model\Consult;
use App\Model\Course;
use App\Model\Navcon;
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
        return view('index.article',compact('data','arr','hotask','course'));
    }
    //咨询详情页面
    public function articlelist()
    {
        return view("index.articlelist");
    }
}
