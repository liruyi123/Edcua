<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - 表单验证 jQuery Validation</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
</head>
@extends('admin.first')
@section('title','添加上下导航栏')
@section('content')
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>导航栏添加页面</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t form_cat " id="signupForm form_cat">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏名称：</label>
                                <div class="col-sm-8">
                                    <input id="nav_name" name="nav_name" class="form-control nav_name" type="text" value="{{$data['nav_name']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏路径：</label>
                                <div class="col-sm-8">
                                    <input id="nav_url" name="nav_url" class="form-control nav_url" type="url" value="{{$data['nav_url']}}" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">请选择导航栏类型：</label>
                                <div class="col-sm-8">
                                <div class="checkbox">
                                <input id="nav_id" name="nav_id" class="form-control nav_id" value="{{$data['nav_id']}}" type="hidden">
                                    <div class="radio nav_type">
                                        @if($data['nav_type']==1)
                                            <label>
                                                <input type="radio" value="1" id="nav_type" class="nav_type" checked name="nav_type">顶部导航栏</label>
                                            <label>
                                                <input type="radio" value="2" id="nav_type" class="nav_type" name="nav_type">底部导航栏</label>
                                        @else
                                            <label>
                                                <input type="radio" value="1" id="nav_type" class="nav_type" name="nav_type">顶部导航栏</label>
                                            <label>
                                                <input type="radio" value="2" id="nav_type" class="nav_type"  checked name="nav_type">底部导航栏</label>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏权重：</label>
                                <div class="col-sm-8">
                                    <input id="nav_weight" name="nav_weight" class="form-control nav_weight" value="{{$data['nav_weight']}}" type="number" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary"  id="btn" type="button">修改</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
 
@endsection
<script src="/admin/js/jquery-1.8.0.min.js"></script>
<script>
    $(document).ready(function () {
    layui.use('layer', function () {
        var layer = layui.layer;
        $("#btn").click(function()
        {
            var nav_name=document.querySelector('.nav_name').value;
            var nav_url=document.querySelector('.nav_url').value;
            var nav_type = document.querySelector('input[name=nav_type]:checked').value;
            var nav_weight=document.querySelector('.nav_weight').value;
            var nav_id=document.querySelector('.nav_id').value;
            var u=/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\*\+,;=.]+$/
            if(nav_name==""){
                layer.msg('导航栏名称不能为空!',{icon:2});
                return false;
            }else if(nav_url==""){
                layer.msg('导航栏路径不能为空!',{icon:2});
                return false;
            }else if(u.test(nav_url)==false){
                layer.msg('导航栏路径格式不正确例：http://www.educations.com/admin/index！',{icon:2});
                return false;
            }else if(nav_weight==""){
                layer.msg('导航栏权重不能为空!',{icon:2});
                return false;
            }
            $.ajax({
                url:"/admin/navupdatedo",
                type:"POST",
                data:{nav_name:nav_name,nav_url:nav_url,nav_type:nav_type,nav_weight:nav_weight,nav_id:nav_id},
                dataType:"",
                async:true,
                success:function(res){
                    if(res==200){
                        layer.msg('恭喜您，导航栏修改成功！',{icon:1});
                        location.href="{{url('/admin/navbarlist')}}";
                    }else{
                        layer.msg('很遗憾，导航栏修改失败！',{icon:2});
                    }
                }
            })
        })    
    });
})
</script>