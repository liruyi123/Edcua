@extends("index.ments")

<link rel="stylesheet" href="/index/css/course.css"/>
<script src="/index/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>
@section("content")
<body>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic">
    <input type="hidden" value="{{$data['cou_id']}}" id="cou_id">
	<div class="course_img"><img src="{{$data['path']}}" width="500" class="img"></div>
    <div class="coursetitle">
   		<a class="state">更新中</a>
    	<h2 class="courseh2">{{$data['cou_name']}}</h2>
        <p class="courstime">总课时：<span class="course_tt">{{$KSarr}}课时</span></p>
		<p class="courstime">课程时长：<span class="course_tt">{{$data['cou_duration']}}分钟</span></p>
        <p class="courstime">学习人数：
            <span class="course_tt">
                @if($CUarr == "")
                    0
                @else
                    {{$CUarr}}
                @endif人
            </span></p>
		<p class="courstime">课程评价：<span class="hidden-sm hidden-xs">{{$scoreSum}}分（{{$scoreNum}}人评价）</span></p>
        <!--<p><a class="state end">完结</a></p>-->      
        <span class="coursebtn">
            <a class="btnlink" href="javascript:;">
                @if($type == 1)
                    继续学习
                @elseif($type == 2)
                    已学完
                @elseif($type == 3)
                    开始学习
                @else
                    开始学习
                @endif
            </a>
            <a class="codol fx" href="javascript:void(0);" onClick="$('#bds').toggle();">分享课程</a>
                @if($collect)
                    <a class="codol sc" href="#" style="background-position: 0px -1800px;">取消收藏</a>
                    @else
                    <a class="codol sc" href="#" style="background-position: 1px -5px;">收藏课程</a>
                @endif
        </span>
		<div style="clear:both;"></div>
		<div id="bds">
            <div class="bdsharebuttonbox">
				<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
				<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
				<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
				<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
				<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
				<a href="#" class="bds_more" data-cmd="more"></a>
				<a class="bds_count" data-cmd="count"></a>
			</div>
            <script>
			window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
			</script>
       </div>
    </div>
    <div class="clearh"></div>
</div>

<div class="clearh"></div>
<div class="coursetext">
	<h3 class="leftit">课程简介</h3>
    <p class="coutex"> {{$data['cou_text']}}</p>
	<div class="clearh"></div>
	<h3 class="leftit">课程目录</h3>
    <dl class="mulu">
        @foreach($couData as $k=>$v)
    	<dt><a href="/index/coursecont1/{{$v['cou_id']}}" class="graylink">{{$v['cata_name']}}</a></dt>
        <dd>{{$v['cata_text']}}</dd>
        @endforeach
    </dl>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">授课讲师</h3>
    <div class="teacher">
    <div class="teapic ppi">
        @foreach($lectsql as $v)
    <a href="/index/teacher/{{$v['lect_id']}}"><img src="{{$v['lect_img']}}" width="80" class="teapicy" title="" id="img"></a>
    <h3 class="tname"><a href="/index/teacher/{{$v['lect_id']}}" class="peptitle" id="title"></a><p style="font-size:14px;color:#666">{{$v['lect_name']}}</p></h3>
    @endforeach
    </div>
    <div class="clearh"></div>
    <p id="text"></p>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">课程公告</h3>
    <div class="gonggao">
@foreach($coursesql as $v)
	<div class="clearh"></div>
    <p>{{$v['notice_text']}}<br/>
	<span class="notice_text">{{date('Y-m-d H:i:s',$v['ctime'])}}</span>
	</p>
	@endforeach
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
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script>
        $(function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                $('.codol').click(function () {
                    var _this = $(this);
                    var cou_id = $("#cou_id").val();

                    $.post(
                            '/index/collect',
                            {cou_id: cou_id},
                            function (res) {
                                if (res.error == 10001) {
                                    layer.msg(res.msg, {icon: 6});
                                } else {
                                    layer.msg(res.msg, {icon: 2});
                                }
                            }, 'json'
                    );
                });

                $(".btnlink").click(function () {
                    var cou_id = $("#cou_id").val();
                    $.ajax({
                        url:"/index/btnlink",
                        type:"POST",
                        data:{cou_id:cou_id},
                        datatype:"json",
                        async:true,
                        success:function(res){
                            console.log(res);
                            if(res.code == 200){
                                window.location.href = "/index/coursecont1"+cou_id;
                            }else if(res.code == 201){
                                layer.msg(msg.message,{icon:2});
                                window.location.href = "/index/login";
                            }else{
                                layer.msg("error",{icon:2});
                            }
                        }
                    })
                })
            });
        });
    </script>
    <script>
        $(function () {
            var lect_id = $(".lect").attr("lect_id");
            $.ajax({
                url : "/index/lect",
                type : "POST",
                data : {lect_id:lect_id},
                dataType : "JSON",
                success : function (res) {
                    $(".lect").text("讲师："+res.data.lect_name);
                    $(".img").prop("src",res.data.lect_img);
                    $("#img").prop("title",res.data.lect_name);
                    $("#img").prop("src",res.data.lect_img);
                    $("#title").text(res.data.lect_name);
                    $("#text").text(res.data.lect_resume);
                }
            });
        })
    </script>


    @endsection