<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>

    <meta charset="utf-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>谋刻职业教育在线测评与学习平台</title>
    <link rel="stylesheet" href="css/course.css"/>
    <link rel="stylesheet" href="css/member.css"/>
    <script src="js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <script src="js/jquery.tabs.js"></script>
    <script src="js/mine.js"></script>
    <script src="/layui/layui.js"></script>
    <script type="text/javascript">
        $(function(){


            $('.demo2').Tabs({
                event:'click'
            });



        });
    </script>
    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->

</head>

<body>

<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="index.html"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
            @foreach($ments as $k => $v)
                <li class="a"><a href="{{$v->nav_url}}" class="link1">{{$v->nav_name}}</a></li>
            @endforeach

        </ul>
        <span class="massage">
            <!--<span class="select">
        	<a href="#" class="sort">课程</a>
        	<input type="text" value="关键字"/>
            <a href="#" class="sellink"></a>
            <span class="sortext">
            	<p>课程</p>
                <p>题库</p>
                <p>讲师</p>
            </span>

            <!--未登录-->
            @if(Session('user_id') == "")
                <span class="exambtn_lore">
                <a class="tkbtn tkreg" href="/index/register" style="float: right">注册</a>
                 <a class="tkbtn tklog" href="/index/login" style="float: right">登录&nbsp;&nbsp;</a>

            </span>
                @elseif(session('user_id') != "")
                        <!--登录后-->
                <div class="logined">
                    <a href="mycourse.html"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">{{session("user_name")}}</a>
                <span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
                    <span style="background:#fff;">
                        <a href="mycourse.html" style="width:70px; display:block;" class="link2 he ico" target="_blank">{{session("user_name")}}</a>
                    </span>
                <div class="clearh"></div>
                <ul class="logmine" >
                    <li><a class="link1" href="#">我的课程</a></li>
                    <li><a class="link1" href="#">我的题库</a></li>
                    <li><a class="link1" href="#">我的问答</a></li>
                    <li><a class="link1 exit" href="javascript:;">退出</a></li>
                </ul>
                </span>
                </div>
            @endif
        </span>
    </div>
</div>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="clearh"></div>
<div class="membertab">
    <div class="memblist">
        <div class="membhead">
            <div style="text-align:center;"><img src="{{$user['user_image']}}" width="80" ></div>
            <div style="width:220px;text-align:center;">
                <p class="membUpdate mine">{{$user['user_name']}}</p>
                <p class="membUpdate mine"><a href="mysetting.html">修改信息</a>&nbsp;|&nbsp;<a href="myrepassword.html">修改密码</a></p>
                <div class="clearh"></div>
            </div>
        </div>
        <div class="memb">

            <ul>
                <li><a class="mb1" href="/index/my">我的课程</a></li>
                <li><a class="mb3" href="/index/myask">我的问答</a></li>
                <li><a class="mb4" href="/index/mynote">我的笔记</a></li>
                <li class="currnav"><a class="mb12" href="/index/myhomework">我的作业</a></li>
                <li><a class="mb2" href="/index/training_list">我的题库</a></li>
            </ul>

        </div>


    </div>


    <div class="membcont">
        <h3 class="mem-h3">我的作业</h3>

    </div>


    <div class="clearh"></div>

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

<!-- InstanceEnd --></html>
