<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CommonController extends Controller
{
    //非法登陆
    public function __construct()
    {
        $id = session("uid");
        if(empty($id)){
            echo "<script>alert('请先登陆！');location.href='/admin/login'</script>";die;
        }
    }
}
