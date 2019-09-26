@extends("admin.first")
<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">
<script>if(window.top !== window.self){ window.top.location = window.location;}</script>

<body class="gray-bg">
@section("content")
<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">H+</h1>

        </div>
        <h3>欢迎注册 H+</h3>
        <p>创建一个H+新账户</p>
        <form class="m-t" role="form" action="login.html">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入用户名" required="" id="name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入手机号" required="" id="tel">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入邮箱" required="" id="emali">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="请输入密码" required="" id="pwd">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="请再次输入密码" required="" id="pwd1">
            </div>
            <div class="form-group text-left">
                <div class="checkbox i-checks">
                    <label class="no-padding">
                        <input type="checkbox"><i></i> 我同意注册协议</label>
                </div>
            </div>
            <button type="button" class="btn btn-primary block full-width m-b" id="reg">注 册</button>

            <p class="text-muted text-center"><small>已经有账户了？</small><a href="/admin/login">点此登录</a>
            </p>

        </form>
    </div>
</div>
@endsection
<!-- 全局js -->
@section("js")

<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
    $(document).on("click","#reg",function () {

        var name = $("#name").val();
        var tel = $("#tel").val();
        var emali = $("#emali").val();
        var pwd = $("#pwd").val();
        var pwd1 = $("#pwd1").val();
        if(name == ""){
            layer.msg('用户名不能为空!',{icon:2});
            return false;
        }
        if(tel == ""){
            layer.msg('手机号不能为空!',{icon:2});
            return false;
        }
        if(emali == ""){
            layer.msg('邮箱不能为空!',{icon:2});
            return false;
        }
        if(pwd == ""){
            layer.msg('密码不能为空!',{icon:2});
            return false;
        }
        if(pwd1 == ""){
            layer.msg('密码不能为空!',{icon:2});
            return false;
        }
        if(pwd != pwd1){
            layer.msg('两次密码输入有误!',{icon:2});
            return false;
        }
        $.ajax({
            url : "/admin/registerDo",
            type : "POST",
            data : {name:name,tel:tel,emali:emali,pwd:pwd,pwd1:pwd1},
            dataType : "JSON",
            success : function (res) {
               if(res.code == "200"){
                   layer.msg(res.message,{icon:6},{time:3000});
                   location.href="/admin/login";
               }else{
                   layue.msg(res.message,{icon:2});
               }
            }
        });

    })
</script>



@endsection
</body>

</html>
