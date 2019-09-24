<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - 表单验证 jQuery Validation</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
</head>
@extends('admin.first')
@section('title','添加上下导航栏')
@section('content')
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>导航栏添加页面</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t form_cat " id="signupForm form_cat">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏名称：</label>
                                <div class="col-sm-8">
                                    <input id="nav_name" name="nav_name" class="form-control nav_name" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏路径：</label>
                                <div class="col-sm-8">
                                    <input id="nav_url" name="nav_url" class="form-control nav_url" type="url" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">请选择导航栏类型：</label>
                                <div class="col-sm-8">
                                <div class="checkbox">
                                    <div class="radio nav_type">
                                        <label>
                                            <input type="radio" value="1" id="nav_type" class="nav_type" checked name="nav_type">顶部导航栏</label>
                                        <label>
                                            <input type="radio" value="2" id="nav_type" class="nav_type" name="nav_type">底部导航栏</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏权重：</label>
                                <div class="col-sm-8">
                                    <input id="nav_weight" name="nav_weight" class="form-control nav_weight" type="number" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary"  onclick="displayDate()" type="button">提交</button>
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
<script>
    function displayDate()
    {
        var nav_name=document.querySelector('.nav_name').value;
        var nav_url=document.querySelector('.nav_url').value;
        var nav_type = document.querySelector('input[name=nav_type]:checked').value;
        var nav_weight=document.querySelector('.nav_weight').value;
        var u=/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\*\+,;=.]+$/
        if(nav_name==""){
            alert('导航栏名称不能为空！');
            return false;
        }else if(nav_url==""){
            alert('导航栏路径不能为空！');
            return false;
        }else if(u.test(nav_url)==false){
            alert('导航栏路径格式不正确例：http://www.educations.com/admin/index！');
            return false;
        }else if(nav_weight==""){
            alert('导航栏权重不能为空！');
            return false;
        }
        $.ajax({
            url:"./navbardo",
            type:"POST",
            data:{nav_name:nav_name,nav_url:nav_url,nav_type:nav_type,nav_weight:nav_weight},
            dataType:"",
            async:true,
            success:function(res){
                if(res==200){
                    alert('恭喜您，导航栏添加成功！');
                    location.href="{{url('/admin/navbarlist')}}";
                }else{
                    alert('很遗憾，导航栏添加失败！');
                }
            }
        })
    }
</script>