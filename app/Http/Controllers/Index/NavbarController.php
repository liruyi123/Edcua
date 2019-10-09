<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;

class NavbarController extends Controller
{
    //  导航栏
    public function ments()
    {
        $ments = NavbarModel::where('status',1)->orderBy('nav_weight','desc')->get();
//        print_r($ments);die;
        return view('index.ments',compact('ments'));
    }
}
