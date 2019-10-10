<?php

namespace App\Http\Controllers\Index;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
class IndexController extends Controller
{
    //

    //首页操作->课程页面
    public function index()
    {

        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        $res=NavbarModel::where(['status'=>1,'nav_type'=>2])->orderBy('nav_weight','desc')->get();
//        $user = UserModel::where(['user_id'=>session("user_id")])->first();
        return view("index.index",compact('ments','res'));
    }


}
