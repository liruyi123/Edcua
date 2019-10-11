
@extends("index.ments")
<link rel="stylesheet" href="/index/css/course.css"/>
<link rel="stylesheet" href="/index/css/register-login.css"/>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<link rel="stylesheet" href="/index/css/style2.css"/>
<script src="/index/js/init.js"></script>
<script src="/index/js/home.js"></script>
<link href="/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<script src="js/jquery.tabs.js"></script>
{{--<link rel="stylesheet" href="/index/css/ui1.css"/>--}}
@section('content')
<body>
<!-- InstanceBeginEditable name="EditRegion1" -->


<div class="coursecont">
    <div class="coursepic1">
        <div class="coursetitle1">
            <h2 class="courseh21">{{$data['cou_name']}}</h2>
            <div  style="margin-top:-40px;margin-right:25px;float:right;">
                <div class="bdsharebuttonbox">
                    <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
                    <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
                    <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
                    <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
                    <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
                    <a href="#" class="bds_more" data-cmd="more"></a>
                    <a class="bds_count" data-cmd="count"></a>
                </div>
                <input type="hidden" class="cou_id" value="{{$data['cou_id']}}">
                <script>
                    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                </script>
            </div>
        </div>
        <div class="course_img1">
            <img src="{{$data['path']}}" height="140">
            <input type="hidden" value="{{$data['cou_id']}}" id="cou_id">
        </div>
        <div class="course_xq">
            <span class="courstime1"><p>课时<br/><span class="coursxq_num">{{$KSarr}}课时</span></p></span>
            <span class="courstime1"><p>学习人数<br/>
                    <span class="coursxq_num">
                        @if($CUarr == "")
                            0
                        @else
                            {{$CUarr}}
                        @endif
                            人
                    </span></p></span>
            <span class="courstime1"><p style="border:none;">课程时长<br/><span class="coursxq_num">3小时20分</span></p></span>
        </div>
        <div class="course_xq2">
            <a class="course_learn" href="#">开始学习</a>
        </div>
        <div class="clearh"></div>
    </div>

    <div class="clearh"></div>
    <div class="coursetext">
        <div class="box demo2" style="position:relative">
            <ul class="tab_menu">
                <li class="current course1">章节</li>
                <li class="course1">评价</li>
                <li class="course1">问答</li>
                <li class="course1">资料区</li>
            </ul>
            <!--<a class="fombtn" style=" position:absolute; z-index:3; top:-10px; width:80px; text-align:center;right:0px;" href="#">下载资料包</a>-->
            <div class="tab_box">
                <div>
                    <dl class="mulu noo">


                        @foreach($catadata as $k=>$v)
                            <div>
                                <dt class="mulu_title"><span class="mulu_img"></span>{{$v['cata_name']}}
                                    <span class="mulu_zd">+</span></dt>
                                <div class="mulu_con">
                                    @foreach($v['son'] as $kk=>$vv)
                                        <dd class="smalltitle"><strong>{{$vv['cata_name']}}</strong></dd>
                                        @foreach($vv['son'] as $kkk=>$vvv)
                                            <a href="video.html"><dd><strong class="cataloglink">{{$vvv['cata_name']}}</strong><i class="fini nn"></i></dd></a>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endforeach


                    </dl>
                </div>
                 <!-- 课程评论模块开始 -->
                <div class="hide">
                    <div>
                        <div id="star">
                            <span class="startitle">请打分</span>
                            <ul class="pingfen">
                                <li value="1"><a href="javascript:;">1</a></li>
                                <li value="2"><a href="javascript:;">2</a></li>
                                <li value="3"><a href="javascript:;">3</a></li>
                                <li value="4"><a href="javascript:;">4</a></li>
                                <li value="5"><a href="javascript:;">5</a></li>
                            </ul>
                            <span></span>
                            <p></p>
                        </div>
                        <div class="c_eform">
                            <textarea rows="7" class="pingjia_con comments"></textarea>
                            <a href="#" class="fombtn courseconts">发布评论</a>
                            <div class="clearh"></div>
                        </div>
                        <ul class="evalucourse">
                        @foreach($coursecommentlist as $k=>$v)
                            <li>
                        	<span class="pephead"><img src="{{$v['user_image']}}" width="50" title="候候">
                            <p class="pepname">{{$v['user_name']}}</p>
                            <p>评分：<font color="red" font-size="7">{{$v['score']}}</font></p>
                            </span>
                            @if($v['c_text']=="")
                                <span class="pepcont"><p>默默的支持！</p>
                            @else
                                <span class="pepcont"><p>{{$v['c_text']}}</p>
                            @endif
                            <p class="peptime pswer">{{date('Y-m-d H:i:s',$v['utime'])}}</p></span>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <!-- 前台课程评论模块结束 -->
                <div class="hide">
                    <div>
                        <h3 class="pingjia">提问题</h3>
                        <div class="c_eform">
                            <textarea rows="7" id="tiwen_con" class="pingjia_con tiwen_con" onblur="if (this.value =='') this.value='请输入问题的详细内容';this.className='pingjia_con'" onclick="if (this.value=='请输入问题的详细内容') this.value='';this.className='pingjia_con_on'">请输入问题的详细内容</textarea>
                            <a href="javascript:;" class="fombtn aaa">发布</a>
                            <div class="clearh"></div>
                        </div>
                        <ul class="evalucourse">
                        @foreach($arr as $k=>$v)
                            <li>
                        	<span class="pephead"><img src="/index/images/0-0.JPG" width="50" title="">
							<p class="pepname">{{$v['user_name']}}</p>
                            </span>
                                <span class="pepcont">
                            <p><a  href="javascript:;"  class="peptitle" target="_blank" data-toggle="modal" data-target="#myModal2_{{$v['q_id']}}">{{$v['q_name']}}</a></p>
                            <p class="peptime pswer"><span class="pepask"></span>{{date('Y-m-d H:i:s',$v['q_ctime'])}}</p>
                            </span>
                                <div class="modal inmodal" id="myModal2_{{$v['q_id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated flipInY">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title">问题：{{$v['q_name']}}</h4>
                                            </div>
                                            <div class="modal-body" aaa="111">
                                                @foreach($QCarr as $kk=>$vv)
                                                    @if($vv['q_id'] == $v['q_id'])
                                                        <span>{{$vv['user_name']}}:{{$vv['c_test']}}</span>
                                                        <br>
                                                    @endif
                                                @endforeach
                                                <br>
                                                <input type="text" id="c_answer" class="form-control ccc" placeholder="期待您的回答">
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" aid="{{$v['q_id']}}">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                                <button type="button" class="btn bbb btn-primary">提交</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="hide">
                    <div>
                        <ul class="notelist" >
                            <li>
                                <p class="mbm mem_not"><a href="#" class="peptitle">1.rar</a></p>
                                <p class="gray"><b class="coclass">课时：<a href="#" target="_blank">会计的概念与目标1</a></b><b class="cotime">上传时间：<b class="coclass" >2015-05-8</b></b></p>

                            </li>
                            <li>
                                <p class="mbm mem_not"><a href="#" class="peptitle">资料.rar</a></p>
                                <p class="gray"><b class="coclass">课时：<a href="#" target="_blank">会计的概念与目标2</a></b><b class="cotime">上传时间：<b class="coclass" >2015-05-8</b></b></p>



                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="courightext">
        <div class="ctext">
            <div class="cr1">
                <h3 class="righttit">授课讲师</h3>
                <div class="teacher">
                    <div class="teapic ppi">
                        <a href="teacher.html" target="_blank"><img src="{{$data['lect_img']}}" width="80" class="teapicy" title="{{$data['lect_name']}}"></a>
                        <h3 class="tname"><a href="teacher.html" class="peptitle" target="_blank">{{$data['lect_name']}}</a><p style="font-size:14px;color:#666">会计讲师</p></h3>
                    </div>
                    <div class="clearh"></div>
                    <p>{{$data['lect_resume']}}</p>
                </div>
            </div>
        </div>

        <div class="ctext">
            <div class="cr1">
                <h3 class="righttit" onclick="reglog_open();">最新学员</h3>
                <div class="teacher zxxy">
                    <ul class="stuul">
                        <li><img src="/index/images/0-0.JPG" width="60"><p class="stuname">张三李四</p></li>
                        <li><img src="/index/images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                        <li><img src="/index/images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                        <li><img src="/index/images/0-0.JPG" width="60" title="张三李四"><p class="stuname">张三李四</p></li>
                    </ul>
                    <div class="clearh"></div>
                </div>
            </div>
        </div>

        <div class="ctext">
            <div class="cr1">
                <h3 class="righttit">相关课程</h3>
                <div class="teacher">
                @foreach($countsql as $k=>$v)
                <div class="clearh"></div>
                <div class="teapic">
                    <a href="#"><img src="{{$v['path']}}" height="60"></a>
                    <h3 class="courh3"><a href="/index/coursecont/{{$v['cou_id']}}" class="peptitle">{{$v['cou_name']}}</a></h3>
                </div>
                @endforeach
                    <div class="clearh"></div>
                </div>
            </div>
        </div>

    </div>

    <div id="reglog">
        <span class="close"  onclick="reglog_close();">×</span>
        <div class="loginbox">
            <div class="demo3 rlog">
                <ul class="tab_menu rlog">
                    <li class="current">登录</li>
                    <li>注册</li>
                </ul>
                <div class="tab_box">
                    <div>
                        <form class="loginform pop">
                            <div>
                                <p class="formrow">
                                    <label class="control-label pop" for="register_email">帐号</label>
                                    <input type="text" class="popinput">
                                </p>
                                <span class="text-danger">请输入Email地址 / 用户昵称</span>
                            </div>

                            <div>
                                <p class="formrow">
                                    <label class="control-label pop" for="register_email">密码</label>
                                    <input type="password" class="popinput">
                                </p>
                                <p class="help-block"><span class="text-danger">密码错误</span></p>
                            </div>
                            <div class="clearh"></div>
                            <div class="popbtn">
                                <label><input type="checkbox" checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
                                <button type="submit" class="uploadbtn ub1">登录</button>

                            </div>
                            <div class="popbtn lb">
                                <a href="#" class="link-muted">还没有账号？立即免费注册</a>
                                <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                <a href="forgetpassword.html" class="link-muted">找回密码</a>
                            </div>


                            <div class="popbtn hezuologo">
                                <span class="hezuo z1">使用合作网站账号登录</span>
                                <div class="hezuoimg z1">
                                    <img src="images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40">
                                    <img src="images/hezuowb.png" class="hzwb" title="微博" width="40" height="40">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="hide">
                        <div>
                            <form class="loginform pop">
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">邮箱地址</label>
                                        <input type="text" class="popinput">
                                    </p>
                                    <span class="text-danger">请输入Email地址 / 用户昵称</span>
                                </div>
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">昵称</label>
                                        <input type="text" class="popinput">
                                    </p>
                                    <span class="text-danger">请输入Email地址 / 用户昵称</span>
                                </div>
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">密码</label>
                                        <input type="password" class="popinput">
                                    </p>
                                    <p class="help-block"><span class="text-danger">密码错误</span></p>
                                </div>
                                <div>
                                    <p class="formrow">
                                        <label class="control-label pop" for="register_email">确认密码</label>
                                        <input type="password" class="popinput">
                                    </p>
                                    <p class="help-block"><span class="text-danger">密码错误</span></p>
                                </div>


                                <button type="submit" class="uploadbtn ub1">注册</button>



                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
<div class="foot">
    <div class="fcontainer">
        <div class="fwxwb">
            <div class="fwxwb_1">
                <span>关注微信</span><img width="95" alt="" src="/index/images/num.png">
            </div>
            <div>
                <span>关注微博</span><img width="95" alt="" src="/index/images/wb.png">
            </div>
        </div>
        <div class="fmenu">
        <p>
            @foreach($res as $k=>$v)
                <a href="{{$v['nav_url']}}">{{$v['nav_name']}}</a> | 
            @endforeach
                <a href="https://www.mobantu.com/advertisement">广告合作</a> 
        </p>
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
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/admin/js/content.js?v=1.0.0"></script>

    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/layui/layui.js"></script>
    <script src="/index/js/mine.js"></script>
    <script type="text/javascript">
        $(function(){

            $('.demo2').Tabs({
                event:'click'
            });
            $('.demo3').Tabs({
                event:'click'
            });
        });
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                $('.aaa').click(function () {
                    var wenti = $("#tiwen_con").val();
                    var cou_id = $("#cou_id").val();
                    // console.log(tiwen_con);
                    $.ajax({
                        type : 'post',
                        url : '/index/tiwen_con',
                        dataType:"json",
                        data:{wenti:wenti,cou_id:cou_id},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "/index/coursecont1/"+cou_id;
                            }else if (msg.code == '201') {
                                layer.msg(msg.message,{icon:2});
                                window.location.href = "/index/login";
                            }else{
                                layer.msg(msg.message,{icon:2});
                            }
                        }
                    })

                });

                $('.bbb').click(function () {
                    var q_id = $(this).siblings(":first").attr("aid");
                    var c_answer = $(this).parent("div").prev().find("input").val();
                    var cou_id = $("#cou_id").val();
                    // alert(b_id);
                    $.ajax({
                        type : 'post',
                        url : '/index/reply',
                        dataType:"json",
                        data:{c_answer:c_answer,q_id:q_id},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "/index/coursecont1/"+cou_id;
                            }else if(msg.code == '201'){
                                layer.msg(msg.message,{icon:2});
                                window.location.href = "/index/login";
                            }else{
                                layer.msg(msg.message,{icon:2});
                            }
                        }
                    })

                });

                $('.courseconts').click(function () {
                    var comments=document.querySelector('.comments').value;
                    var cou_id=document.querySelector('.cou_id').value;
                    var score=$('.pingfen').find('li[class=on]').text();
                    var score=score.substr(score.length-1,1);
                    if(score==""){
                        layer.msg('评价不能为空!',{icon:2});
                        return false;
                    }
                    $.ajax({
                        url:"/index/coursecontadd",
                        type:"POST",
                        data:{comments:comments,cou_id:cou_id,score:score},
                        datatype:"json",
                        async:true,
                        success:function(res){
                            if(res==200){
                                layer.msg('恭喜您，评论添加成功！',{icon:1});
                                window.location.reload();
                            }else if(res==404){
                                layer.msg('登录后才能评论！',{icon:2});
                                location.href="{{url('/index/login')}}";
                            }else{
                                layer.msg('很遗憾，评论添加失败！',{icon:2});
                            }
                        }
                    })
                });
            });
        });
    </script>
    @endsection
