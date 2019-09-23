<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvisoryController extends Controller
{

    //咨询页面
    public function article()
    {
        return view('index.article');
    }
    //咨询详情页面
    public function articlelist()
    {
        return view("index.articlelist");
    }
}
