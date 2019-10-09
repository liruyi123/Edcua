<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
class IndexController extends Controller
{
    //

    //首页操作->课程页面
    public function index()
    {
        $ments = NavbarModel::where('status',1)->orderBy('nav_weight','desc')->get();
        return view("index.index",compact('ments'));
    }


}
