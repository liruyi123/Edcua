@extends("admin.first")
<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">
<!--[if lt IE 9]>
<meta http-equiv="refresh" content="0;ie.html" />
<![endif]-->
<script>if(window.top !== window.self){ window.top.location = window.location;}</script>

<body class="gray-bg">
@section("content")
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">h</h1>

            </div>
            <h3>找回密码！</h3>

            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入用户名" required="" id="name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入邮箱" required="" id="emali">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入验证码" required="" id="codes" style="width:70% ;float: left">
                    <button class="layui-btn" style="float: right;width:25%" type="button" id="code">获取</button>
                    {{--<button class="layui-btn" style="width: 30%;height:45px; float:right; background-color:chartreuse;"id="span_email" disabled="true">获取验证码</button>--}}
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" required="" id="pwd">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="确认密码" required="" id="pwd1">
                </div>
                <button type="button" class="btn btn-primary block full-width m-b" id="btn">确认</button>


                <p class="text-muted text-center">  <a href="/admin/register">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>
@endsection
<!-- 全局js -->
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>
<script>
    $(document).ready(function () {
        layui.use('layer', function () {
            var layer = layui.layer;
        });
    })
    //获取验证码
    $(document).on("click","#code",function () {

        var name = $("#name").val();
        var email = $("#emali").val();
        if(name == ""){
            layer.msg("请输入用户名!",{icon:2});
            return false;
        }
        if(email == ""){
            layer.msg("请输入邮箱!",{icon:2});
            return false;
        }
        // $(this).attr("disabled",true);
        $.ajax({
            url : "/admin/codes",
            type : "POST",
            data : {name:name,email:email},
            dataType : "JSON",
            async : false,
            success : function (res) {
                if(res.code == 200){
                    layer.msg("发送成功,验证码60秒内有效!",{icon:1});
                    $(this).attr("disabled",false);
                }else{
                    layer.msg("发送失败!",{icon:2});
                    $(this).attr("disabled",false);
                }
            }
        });
    })
    //确认
    $(document).on("click","#btn",function () {
        var name = $("#name").val();
        var email = $("#emali").val();
        var code = $("#codes").val();
        var pwd = $("#pwd").val();
        var pwd1 = $("#pwd1").val();
        if(name ==""){
            layer.msg('用户名不能为空!',{icon:2});
            return false;
        }
        if(email == ""){
            layer.msg("请输入邮箱！",{icon:2});
            return false;
        }
        if(code == ""){
            layer.msg("请输入验证码！",{icon:2});
            return false;
        }
        if(pwd == ""){
            layer.msg("密码不能为空!",{icon:2});
            return false;
        }
        if(pwd1 == ""){
            layer.msg("请输入确认密码！",{icon:2});
            return false;
        }
        $.ajax({
            url : "/admin/userFindPwd",
            type : "POST",
            data : {name:name,code:code,email:email,pwd:pwd,pwd1:pwd1},
            dataType : "JSON",
            success : function (res) {
                if(res.code == "200"){
                    layer.alert("密码已重置，是否跳转登陆页面", {
                        skin: 'layui-layer-molv' //样式类名  自定义样式
                        ,closeBtn: 1    // 是否显示关闭按钮
                        ,anim: 1 //动画类型
                        ,btn: ['是','否'] //按钮
                        ,icon: 6    // icon
                        ,yes:function(){
                            location.href="/admin/login";
                        }
                        ,btn2:function(){
                            history.go(0);
                        }});
                }else{
                    layer.msg(res.message,{icon:2});
                }
            }
        });
    })
</script>



</body>

</html>
