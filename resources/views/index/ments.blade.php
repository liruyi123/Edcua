<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>谋刻职业教育在线测评与学习平台</title>
    {{--<link rel="stylesheet" href="css/course.css"/>--}}
    @yield("css")
    <link rel="stylesheet" href="css/register-login.css"/>

    <link rel="stylesheet" href="css/tab.css" media="screen">
    {{--<link rel="stylesheet" href="/static/build/layui.css" media="all">--}}
</head>

<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="/"><img border="0" src="/index/images/logo.png"></a></span>
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
        </span>-->
            <!--未登录-->
        	<span class="exambtn_lore">
                 <a class="tkbtn tklog" href="/index/login">登录</a>
                 <a class="tkbtn tkreg" href="/index/register">注册</a>
            </span>
            <!--登录后-->
            <!--<div class="logined">
                <a href="mycourse.html"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">sherley</a>
                <span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
                    <span style="background:#fff;">
                        <a href="mycourse.html" style="width:70px; display:block;" class="link2 he ico" target="_blank">sherley</a>
                    </span>
                    <div class="clearh"></div>
                    <ul class="logmine" >
                        <li><a class="link1" href="#">我的课程</a></li>
                        <li><a class="link1" href="#">我的题库</a></li>
                        <li><a class="link1" href="#">我的问答</a></li>
                        <li><a class="link1" href="#">退出</a></li>
                    </ul>
                </span>
            </div>-->

        </span>
    </div>
</div>


@yield('content')
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/index/js/rev-setting-1.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/layui/layui.js"></script>
@yield('js')
<script>
    $(function () {
        $(".link1").click(function () {
            $(this).addClass("current").parent("li").next("li").children("a").removeClass("current");
        })
    })

</script>
</html>