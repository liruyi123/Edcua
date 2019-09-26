<?php

namespace App\Http\Controllers\Admin;

use App\Model\CourseCategoryModel;
use App\Model\CourseModel;
use App\Model\LecturerModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //课程分类的添加
    public function courseCategoryAdd(){
        $data = CourseCategoryModel::where(['is_show'=>1,'status'=>1,'pid'=>0])->get()->toArray();
        $data = [
            'data'=>$data
        ];

        return view("admin.course.coursecategoryadd" , $data);
    }

    // 课程分类添加的执行
    public function courseCategoryAdd_do(Request $request){
        $data = $request->input();
        $c_name = $data['c_name'];
        if (empty($c_name)){
            return $this->code(201,"名称不能为空" ,"");
        }
        $pid = $data['navbar'];
        $weight = $data['c_size'];
        if (empty($weight)){
            return $this->code(201,"权重不能为空","");
        }
        $type = $data['type'];

        $data = [
            'cate_name' => $c_name,
            'pid' => $pid,
            'cate_weight' => $weight,
            'is_show' => $type,
            'utime' => time(),
            'ctime' => time(),
            'status' => 1
        ];
        $res = CourseCategoryModel::insert($data);
        if ($res == 1){
            return $this->code(200,"添加成功","");
        }else{
            return $this->code(200,"很抱歉，添加失败了。。。","");
        }
    }

    // 课程分类的展示
    public function courseCategoryList(){
        $arr = CourseCategoryModel::where(['status'=>1])->select()->paginate(3);


        return view("admin.course.coursecategorylist" , ['arr'=>$arr]);
    }

    // 课程分类的删除
    public function CCGDel(Request $request){
        $cid = $request->input("cid");
        $arr = CourseCategoryModel::where(['pid'=>$cid])->get()->toArray();
        if (!empty($arr)){
            return $this->code(201,"该分类下有子分类，不能删除" ,"");
        }else{
            $res = CourseCategoryModel::where(['cate_id' => $cid])->update(['status'=>2]);
            if ($res == 1){
                return $this->code(201,"删除成功" ,"");
            }else{
                return $this->code(201,"删除失败" ,"");
            }

        }
    }

    // 课程分类修改页面
    public function CCGUpd(Request $request){
        $cate_id = $request->input("id");

        $arr = CourseCategoryModel::where(['cate_id'=>$cate_id])->first()->toArray();

        // 查询课程分类
        $data = CourseCategoryModel::where(['is_show'=>1,'status'=>1,'pid'=>0])->get()->toArray();

        $data = [
            'arr' => $arr,
            'data' => $data
        ];

        return view("admin.course.coursecategoryupd" , $data);
    }

    // 执行分类修改
    public function CCGUpd_do(Request $request){
        $data = $request->input();
        $id = $request->input("cid");
        $data = [
            'cate_name' => $data['c_name'],
            'is_show' => $data['type'],
            'cate_weight' => $data['c_size'],
            'pid' => $data['category'],
            'utime' => time(),
        ];
        $res = CourseCategoryModel::where(['cate_id'=>$id])->update($data);
        if ($res == 1){
            return $this->code(200,"修改成功","");
        }else{
            return $this->code(200,"修改失败","");
        }
    }

    // 课程添加页面
    public function courseAdd(){
        // 查询课程分类
        $res = CourseCategoryModel::where(['status'=>1])->get()->toArray();
        $arr = $this->getIndexCateInfo($res,0);

        // 查询讲师
        $lecArr = LecturerModel::where(['status'=>1,'is_show'=>1])->get()->toArray();
//        print_r($lecArr);die;

        return view("admin.course.courseadd" , ['arr'=>$arr,'lecArr'=>$lecArr]);
    }

    // 课程添加执行
    public function courseAdd_do(Request $request){
        $cou_name = $request->input("c_name");
        if (empty($cou_name)){
            return $this->code(201,"名称不能为空" ,"");
        }
        $cate_id = $request->input("category");
        if ($cate_id == 0){
            return $this->code(201,"课程分类不能为空" ,"");
        }
        $cou_weight = $request->input("c_size");
        if (empty($cou_weight)){
            return $this->code(201,"权重不能为空" ,"");
        }
        $cou_duration = $request->input("l_size");
        if (empty($cou_duration)){
            return $this->code(201,"时长不能为空" ,"");
        }
        $is_show = $request->input("type");
        if (empty($is_show)){
            return $this->code(201,"是否展示不能为空" ,"");
        }
        $lect_id = $request->input("lecturer");
        if ( $lect_id == 0 ){
            return $this->code(201,"授课讲师不能为空" ,"");
        }
        $path = $request->input("path");
        if (empty($path)){
            return $this->code(201,"路径不能为空" ,"");
        }
        $text = $request->input("text");
        if (empty($text)){
            return $this->code(201,"课程简介不能为空" ,"");
        }

        $data = [
            'cou_name'=>$cou_name,
            'cou_weight'=>$cou_weight,
            'cate_id'=>$cate_id,
            'cou_duration'=>$cou_duration,
            'is_show'=>$is_show,
            'lect_id'=>$lect_id,
            'path'=>$path,
            'cou_text'=>$text,
            'ctime' => time(),
            'utime' => time(),
        ];
        $res = CourseModel::insert($data);

        if ($res == 1){
            return $this->code(200,"添加成功","");
        }else{
            return $this->code(200,"很抱歉，添加失败了。。。","");
        }

    }

    // 课程展示页面
    public function courseList(){

        $arr = CourseModel::leftjoin('course_category','course.cate_id','=','course_category.cate_id')->where(['course.status'=>1])->select()->paginate(3)->toArray();

//        print_r($arr);die;
        return view("admin.course.courselist" , ['arr' => $arr]);
    }

    // 课程删除
    public function couserDel(Request $request){
        $id = $request->input("cid");
        $res = CourseModel::where(['cou_id' => $id])->update(['status'=>2]);
        if ($res == 1){
            return $this->code(200,"删除成功" ,"");
        }else{
            return $this->code(201,"删除失败" ,"");
        }
    }

    // 课程分类修改页面
    public function courseUpd(Request $request){
        $cou_id = $request->input("id");

        $arr = CourseModel::where(['cou_id'=>$cou_id])->first()->toArray();

        // 查询课程分类
        $data = CourseCategoryModel::where(['is_show'=>1,'status'=>1,'pid'=>0])->get()->toArray();

        // 查询讲师
        $lecArr = LecturerModel::where(['status'=>1,'is_show'=>1])->get()->toArray();

        $data = [
            'arr' => $arr,
            'data' => $data,
            'lectArr' => $lecArr
        ];

        return view("admin.course.courseupd" , $data);
    }

    // 执行课程修改
    public function courseUpd_do(Request $request){
        $data = $request->input();
        $id = $request->input("cid");
        $data = [
            'cate_name' => $data['c_name'],
            'is_show' => $data['type'],
            'cate_weight' => $data['c_size'],
            'pid' => $data['category'],
            'utime' => time(),
        ];
        $res = CourseCategoryModel::where(['cate_id'=>$id])->update($data);
        if ($res == 1){
            return $this->code(200,"修改成功","");
        }else{
            return $this->code(200,"修改失败","");
        }
    }

    // 返回的数据格式
    public function code($code="",$msg="",$data=[])
    {
        $data = [
            "code" => $code,
            "message" => $msg,
            "data" => $data
        ];
        echo  json_encode($data,JSON_UNESCAPED_UNICODE);die;
    }

    // 无限极分类处理数组
    function getIndexCateInfo($data,$pid=0){
        $cateInfo=[];
        foreach($data as $k=>$v){
            // print_r($v);
            if($v['pid']==$pid){
                $son=$this->getIndexCateInfo($data,$v['cate_id']);
                $v['son']=$son;
                $cateInfo[]=$v;
            }
        }
        return $cateInfo;
    }

    // 文件上传
    public function uploadinfo(){
        $info=$_FILES['file'];
        // print_r($info);die;
        $tmp_name=$info['tmp_name'];
        $img=file_get_contents($tmp_name);
        $name="./admin/uploads/".$info['name'];
        file_put_contents($name,$img,FILE_APPEND);
        $name = ltrim($name,'.');
        echo json_encode(['code'=>1,'msg'=>$name]);

    }

}
