<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisoryController extends Controller
{

    //咨询页面
    public function article()
    {
        return view('article');
    }
    //咨询详情页面
    public function articlelist()
    {
        return view("articlelist");
    }
}
