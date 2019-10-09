@extends("index.ments")


@section("content")
<body>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="login" style="background:url(images/12.jpg) right center no-repeat #fff">
<h2>登录</h2>
<form style="width:600px">
<div>
    <p class="formrow">
    <label class="control-label" for="register_email">帐号</label>
    <input type="text" id="name">
    </p>
    <span class="text-danger">请输入Email地址 / 用户昵称</span>
</div>
<div>
    <p class="formrow">
    <label class="control-label" for="register_email">密码</label>
    <input type="password" id="pwd">
    </p>
    <p class="help-block"><span class="text-danger">输入密码</span></p>
</div>
<div class="loginbtn">
	<label><input type="checkbox"  id="int"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
    <button type="button" class="uploadbtn ub1" id="btn">登录</button>
    
</div>
<div class="loginbtn lb">
   <a href="/index/register" class="link-muted">还没有账号？立即免费注册</a>
   <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>   
   <a href="forgetpassword.html" class="link-muted">找回密码</a>
</div>
</form>
<div class="hezuologo">
    <span class="hezuo">使用合作网站账号登录</span>
    <div class="hezuoimg">
    <img src="images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40"/>
    <img src="images/hezuowb.png" class="hzwb" title="微博" width="40" height="40"/>
    </div>
    
  </div>
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
    <script src="js/jquery-1.8.0.min.js"></script>
    <script>
        layui.use("layer",function () {
            var layer = layui.layer;
        })
        $(document).on("click","#btn",function () {
            var name = $("#name").val();
            var pwd = $("#pwd").val();
            var int = $("#int").prop("checked");
            var type = '';
            if(int == true){
                type =1;
            }else{
                type =0;
            }
            if(name == ""){
                layer.msg("请输入账号！",{icon:2});
                return false;
            }
            if(pwd == ""){
                layer.msg("请输入密码！",{icon:2});
                return false;
            }
            $.ajax({
                url : "/index/loginAdd",
                type : "POST",
                data : {name:name,pwd:pwd,int:int},
                dataType : "JSON",
                success : function(res){
                    if(res.code == 200){
                        layer.msg(res.message,{icon:1,time:3000},function () {
                            location.href = "/";
                        });
                    }else{
                        layer.msg(res.message,{icon:2});
                    }

                }
            });
        })
    </script>
    @endsection
