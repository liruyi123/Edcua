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
                    <h5>讲师添加 <small>名校大神</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
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
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">讲师权重</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ght"> <span class="help-block m-b-none"></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">讲师授课风格</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="style"> <span class="help-block m-b-none"></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >讲师个人简历：</label>
                            <div class="col-sm-10">
                                <textarea id="ccomment" name="comment"  class="form-control resume" required="" aria-required="true"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >讲师照片：</label>
                            <div class="col-sm-10">

                                <button type="button" class="layui-btn" id="test1">
                                    <i class="layui-icon">&#xe67c;</i>上传图片
                                </button>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="ige">
                            <label class="col-sm-2 control-label" >照片：</label>
                            <div class="col-sm-10">
                                <img src="" alt="" id="img" width="50%">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" id="add">确认添加</button>
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
        $("#ige").hide();
        layui.use(["layer","upload"],function () {
            var layer = layui.layer;
            var upload = layui.upload;
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                ,url: '/admin/upload' //上传接口
                ,done: function(res){
                    $("#ige").show();
                    $("#img").attr("src",res.data.src);
                    //上传完毕回调
                }
                ,error: function(){
                    //请求异常回调
                }
            });
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
        var img = $("#img").attr("src");
        if(name == ""){
            layer.msg("姓名不能为空！",{icon:2});
            return false;
        }
        if(ght == ""){
            layer.msg("请设置权重!",{icon:2});
            return false;
        }
        if(style == ""){
            layer.msg("请简述讲师授课风格!",{icon:2});
            return false;
        }
        if(resume == ""){
            layer.msg("请填写讲师简历!",{icon:2});
            return false;
        }
        if(img == ""){
            layer.msg("请上传讲师照片!",{icon:2});
            return false;
        }
        var obj = {};
        obj.name=name,
            obj.ght = ght,
            obj.style = style,
            obj.resume = resume,
            obj.img = img;
        $.ajax({
            url : "/admin/lecturerAdd",
            type : "POST",
            data : {data:obj},
            dataType : "JSON",
            success : function (res) {
                if(res.code == "200"){
                    layer.alert("添加成功，是否跳转展示页面", {
                        skin: 'layui-layer-molv' //样式类名  自定义样式
                        ,closeBtn: 1    // 是否显示关闭按钮
                        ,anim: 1 //动画类型
                        ,btn: ['是','否'] //按钮
                        ,icon: 6    // icon
                        ,yes:function(){
                            location.href="/admin/lecturerList";
                        }
                        ,btn2:function(){
                            history.go(0);
                        }});
                }else{
                    layer.msg(res.message);
                }
            }
        });
    })
</script>




</body>

</html>
