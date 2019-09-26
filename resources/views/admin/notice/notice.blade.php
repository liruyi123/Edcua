@extends('admin.first')
@section('title','添加上下导航栏')
@section('content')


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

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>公告添加</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="commentForm">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公告所对应的课程：</label>
                                <div class="col-sm-9">
                                <div class="col-sm-10">
                                    <select class="form-control m-b cou_id" name="account cou_id">
                                    @foreach($data as $v)
                                        <option value="{{$v['cou_id']}}">{{$v['cou_name']}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公告内容：</label>
                                <div class="col-sm-8">
                                    <div id="editor" class="notice_text"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏权重：</label>
                                <div class="col-sm-8">
                                    <input id="nav_weight" name="nav_weight" class="form-control nav_weight" type="number" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary"   onclick="displayDate()" type="button">提交</button>
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
<script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
<script type="text/javascript">
    var E = window.wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('editor') )
    editor.create()
</script>
@endsection
<script>
    function displayDate(){
        var cou_id=document.querySelector('.cou_id').value;
        var notice_text = $(".w-e-text").children("p").text();
        var nav_weight=document.querySelector('.nav_weight').value;
        if(notice_text=="" || notice_text==undefined || notice_text==null || (notice_text.length>0 && notice_text.trim().length==0)){
            alert('公告内容不能为空,不能全是空格！');
            return false;
        }else if(nav_weight==""){
            alert('公告权重不能为空！');
            return false;
        }
        $.ajax({
            url:"/admin/noticedo",
            type:"POST",
            data:{cou_id:cou_id,notice_text:notice_text,nav_weight:nav_weight},
            datatype:"json",
            async:true,
            success:function(res){
                console.log(res);
            }
        })
    }
</script>