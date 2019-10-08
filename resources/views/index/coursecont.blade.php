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
	<div class="course_img"><img src="" width="500" class="img"></div>
    <div class="coursetitle">
   		<a class="state">更新中</a>
    	<h2 class="courseh2">{{$data[0]['cou_name']}}</h2>
        <p class="courstime">总课时：<span class="course_tt">30课时</span></p>
		<p class="courstime">课程时长：<span class="course_tt">3小时20分</span></p>
        <p class="courstime">学习人数：<span class="course_tt">25987人</span></p>
		<p class="courstime lect" lect_id="{{$data[0]['lect_id']}}"></p>
		<p class="courstime">课程评价：<img width="71" height="14" src="images/evaluate5.png">&nbsp;&nbsp;<span class="hidden-sm hidden-xs">5.0分（10人评价）</span></p>
        <!--<p><a class="state end">完结</a></p>-->      
        <span class="coursebtn"><a class="btnlink" href="/study">加入学习</a><a class="codol fx" href="javascript:void(0);" onClick="$('#bds').toggle();">分享课程</a><a class="codol sc" href="#">收藏课程</a></span>
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
    <p class="coutex">本课程主要针对重新改版后的新大纲会计从业资格考试的学习，主要为零基础学生顺利通过会计从业考试而设立！内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。 本教程为2014最新版教材课程详细讲解，学完后可以直接考证，也可以提高会计业务基础知识</p>
	<div class="clearh"></div>
	<h3 class="leftit">课程目录</h3>
    <dl class="mulu">
    	<dt><a href="coursecont1.html" class="graylink">第一章&nbsp;&nbsp;总论</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>
   
    
    	<dt><a href="#" class="graylink">第二章&nbsp;&nbsp;会计要素与会计等式</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>
    
    
    	<dt><a href="#" class="graylink">第三章&nbsp;&nbsp;会计科目与账户</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>
    
    	<dt><a href="#" class="graylink">第四章&nbsp;&nbsp;会计记账方法</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>

		<dt><a href="#" class="graylink">第五章&nbsp;&nbsp;借贷记账法下主要经济业务的账务处理</a></dt>
        <dd>介绍ISO/OSI七层模型、TCP/IP四层模型、IP地址、DNS、端口、网关等网络知识，为Linux的网络配置打好基础。</dd>

		<dt><a href="#" class="graylink">第六章&nbsp;&nbsp;会计凭证</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>

		<dt><a href="#" class="graylink">第七章&nbsp;&nbsp; 会计账簿</a></dt>
        <dd>介绍ISO/OSI七层模型、TCP/IP四层模型、IP地址、DNS、端口、网关等网络知识，为Linux的网络配置打好基础。</dd>

		<dt><a href="#" class="graylink">第八章&nbsp;&nbsp;账务处理程序</a></dt>
        <dd>介绍ISO/OSI七层模型、TCP/IP四层模型、IP地址、DNS、端口、网关等网络知识，为Linux的网络配置打好基础。</dd>

		<dt><a href="#" class="graylink">第九章&nbsp;&nbsp; 财产清查</a></dt>
        <dd>介绍ISO/OSI七层模型、TCP/IP四层模型、IP地址、DNS、端口、网关等网络知识，为Linux的网络配置打好基础。</dd>

		<dt><a href="#" class="graylink">第十章&nbsp;&nbsp;财务报表</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>
    </dl>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">授课讲师</h3>
    <div class="teacher">
    <div class="teapic ppi">
    <a href="teacher.html" target="_blank"><img src="images/teacher.png" width="80" class="teapicy" title="张民智"></a>
    <h3 class="tname"><a href="teacher.html" class="peptitle" target="_blank">张民智</a><p style="font-size:14px;color:#666">会计讲师</p></h3>
    </div>
    <div class="clearh"></div>
    <p>十年以上Linux从业经验， 培训经验超过八年。在各 个知名培训机构做过金牌 讲师、学科负责人，培训 学员过万人。曾获红帽认 证讲师，微软认证讲师等 资质认证。教学以逻辑性 强、教学细致、知识点准 确著称。</p>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">课程公告</h3>
    <div class="gonggao">
	<div class="clearh"></div>
    <p>人所缺乏的不是才干而是志向，不是成功的能力而是勤劳的意志。<br/>
	<span class="gonggao_time">2014-12-12 15:01</span>
	</p>
	<div class="clearh"></div>
	<p>请学习的同学在每节课学习后务必做完当节课的测试！<br/>
	<span class="gonggao_time">2014-12-12 15:01</span>
	</p>
	<div class="clearh"></div>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">相关课程</h3>
    <div class="teacher">
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c1.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c2.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c3.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
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
    <script src="/index/js/jquery-1.8.0.min.js"></script>
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
                }
            });
        })
    </script>
    @endsection
