<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>谋刻职业教育在线测评与学习平台</title>

</head>

<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="/"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
            <li><a href="/courselist" class="link1">课程</a></li>
            <li><a href="/article" class="link1">资讯</a></li>
            <li><a href="/teacherlist" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="askarea.html" class="link1" target="_blank">问答</a></li>

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
                 <a class="tkbtn tklog" href="/login">登录</a>
                 <a class="tkbtn tkreg" href="/register">注册</a>
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
<script src="/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/js/rev-setting-1.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
@yield('js')

</html>