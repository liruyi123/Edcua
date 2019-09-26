@extends("admin.first")
<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">

<body class="gray-bg">
@section("content")
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>讲师修改 <small>名校大神</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <input type="hidden" name="" id="id" value="{{$data->lect_id}}">
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">讲师姓名</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" value="{{$data->lect_name}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">讲师权重</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ght" value="{{$data->lect_weight}}"> <span class="help-block m-b-none"></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">讲师授课风格</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="style" value="{{$data->lect_style}}"> <span class="help-block m-b-none"></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >讲师个人简历：</label>
                                <div class="col-sm-10">
                                    <textarea id="ccomment" name="comment"  class="form-control resume" required="" aria-required="true">{{$data->lect_resume}}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="button" id="add">确认修改</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- 全局js -->
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<script src="/admin/js/content.js?v=1.0.0"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        layui.use('layer',function () {
            var layer = layui.layer;
        })
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
    $(document).on("click","#add",function () {
        var name = $("#name").val();
        var ght = $("#ght").val();
        var style = $("#style").val();
        var resume = $(".resume").val();
        var id = $("#id").val();
        var obj = {};
        obj.name=name,
            obj.ght = ght,
            obj.style = style,
            obj.resume = resume,
            obj.id = id;
        $.ajax({
            url : "/admin/lecturerUpdateDo",
            type : "POST",
            data : {data:obj},
            dataType : "JSON",
            success : function (res) {
                if(res.code =="200"){
                    layer.msg(res.message,{icon:1,time:2000},function () {
                        location.href="/admin/lecturerList";
                    })
                }else{
                    layer.msg(res.message,{icon:2,time:2000},function () {
                        history.go(0);
                    })
                }

            }
        });
    })
</script>




</body>

</html>
