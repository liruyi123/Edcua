@extends("index.ments")
@section("css")
    <link rel="stylesheet" href="css/course.css"/>
    {{--<link rel="stylesheet" href="/layui/css/layui.css" media="all">--}}
@endsection
@section("content")
    {{--<link rel="stylesheet" href="/layui/css/layui.css" media="all">--}}
    <link rel="stylesheet" href="css/course.css"/>
    <body>
    <!-- InstanceBeginEditable name="EditRegion1" -->
    <div class="register" style="background:url(images/13.jpg) right center no-repeat #fff">
        <h2>修改密码</h2>
        <form>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >邮箱地址</label>
                    <input type="text" id="email"></p>
                <span class="text-danger">请输入邮箱地址</span>
            </div>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >昵称</label>
                    <input type="text" id="name"></p>
                <span class="text-danger">该怎么称呼你？ 中、英文均可，最长14个英文或7个汉字</span>
            </div>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >验证码</label>
                    <input type="text" id="code" style="width: 20%;"> <button type="button" class="uploadbtn ub1" id="btn1" style="height: 52%">获取验证码</button></p>
                <span class="text-danger">请输入验证码</span>
            </div>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >密码</label>
                    <input type="password" id="pwd"></p>
                <span class="text-danger">5-20位英文、数字、符号，区分大小写</span>
            </div>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >确认密码</label>
                    <input type="password" id="pwd1"></p>
                <span class="text-danger">再输入一次密码</span>
            </div>
            <div class="loginbtn reg">
                <button type="button" class="uploadbtn ub1" id="btn">确认</button>
                <button type="button" class="uploadbtn ub1" id="login">登陆</button>
            </div>

        </form>
    </div>
    <!-- InstanceEndEditable -->


    <div class="clearh"></div>
    <div class="foot">
        <div class="fcontainer">
            <div class="fwxwb">
                <div class="fwxwb_1">
                    <span>关注微信</span><img width="95" alt="" src="images/num.png">
                </div>
                <div>
                    <span>关注微博</span><img width="95" alt="" src="images/wb.png">
                </div>
            </div>
            <div class="fmenu">
                <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">优秀讲师</a> | <a href="#">帮助中心</a> | <a href="#">意见反馈</a> | <a href="#">加入我们</a></p>
            </div>
            <div class="copyright">
                <div><a href="/">谋刻网</a>所有&nbsp;晋ICP备12006957号-9</div>
            </div>
        </div>
    </div>
    <!--右侧浮动-->
    <div class="rmbar">
	<span class="barico qq" style="position:relative">
	<div  class="showqq">
	   <p>官方客服QQ:<br>335049335</p>
	</div>
	</span>
        <span class="barico em" style="position:relative">
	  <img src="images/num.png" width="75" class="showem">
	</span>
        <span class="barico wb" style="position:relative">
	  <img src="images/wb.png" width="75" class="showwb">
	</span>
        <span class="barico top" id="top">置顶</span>
    </div>
    </body>
@endsection
@section("js")
    <script src="js/jquery.tabs.js"></script>
    <script src="js/mine.js"></script>
    <script>
        layui.use(["layer","upload"], function () {
            var layer = layui.layer;
            var upload = layui.upload;
            //执行实例
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                ,url: '/index/uploads' //上传接口
                ,done: function(res){
                    console.log(res);
                    //上传完毕回调
                }
                ,error: function(arr){
                    console.log(arr);
                    //请求异常回调
                }
            });
        });
        $(document).on("click","#btn",function () {
            var email = $("#email").val();
            var name = $("#name").val();
            var code = $("#code").val();
            var pwd = $("#pwd").val();
            var pwd1 = $("#pwd1").val();
            if(email == ""){
                layer.msg("请输入邮箱地址!",{icon:2});
                return false;
            }
            if(name == ""){
                layer.msg("请输入昵称!",{icon:2});
                return false;
            }
            if(code == ""){
                layer.msg("请输入验证码！",{icon:2});
                return false;
            }
            if(pwd == ""){
                layer.msg("请输入密码!",{icon:2});
                return false;
            }
            if(pwd1 == ""){
                layer.msg("请输入确认密码！",{icon:2});
                return false;
            }
            if(pwd != pwd1){
                layer.msg("两次密码输入不一致！",{icon:2});
                return false;
            }
            $.ajax({
                url : "/index/pwdAdd",
                type : "POST",
                data : {email:email,name:name,pwd:pwd,pwd1:pwd1,code:code},
                dataType : "JSON",
                success : function (res) {
                    if(res.code == 200){
                        layer.alert(res.message+",是否跳转登陆页面？", {
                            skin: 'layui-layer-molv' //样式类名  自定义样式
                            ,closeBtn: 1    // 是否显示关闭按钮
                            ,anim: 1 //动画类型
                            ,btn: ['是','否'] //按钮
                            ,icon: 6    // icon
                            ,yes:function(){
                                location.href="/index/login";
                            }
                            ,btn2:function(){
                                history.go(0);
                            }});
                    }else{
                        layer.msg(res.message,{icon:2});
                        return false;
                    }
                }
            });
        })
        $(document).on("click","#login",function () {
            location.href="/index/login";
        })
        $(document).on("click","#btn1",function () {
            var email = $("#email").val();
            var name = $("#name").val();
            if(email == ""){
                layer.msg("请输入邮箱！",{icon:2});
                return false;
            }
            if(name == ""){
                layer.msg("请输入昵称！",{icon:2});
                return false;
            }
            // $(this).attr("disabled",true);
            $.ajax({
                url : "/index/pwdCode",
                type : "POST",
                data : {email:email,name:name},
                dataType : "JSON",
                success : function (res) {
                    if(res.code == 200){
                        layer.msg("发送成功,验证码60秒内有效!",{icon:1});
                        $("#btn1").attr("disabled",false);
                    }else{
                        layer.msg(res.message,{icon:2});
                        $("#btn1").attr("disabled",false);
                    }
                }
            });
        })
    </script>
@endsection
