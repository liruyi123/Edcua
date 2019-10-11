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
        <h2>修改个人信息</h2>
        <form>
            <div>
                <input type="hidden" id="user_id" value="{{$user['user_id']}}">
                <p class="formrow"><label class="control-label" for="register_email" >邮箱地址</label>
                    <input type="text" id="email" value="{{$user['user_email']}}"></p>
                <span class="text-danger">请输入邮箱地址</span>
            </div>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >昵称</label>
                    <input type="text" id="name" value="{{$user['user_name']}}"></p>
                <span class="text-danger">该怎么称呼你？ 中、英文均可，最长14个英文或7个汉字</span>
            </div>
            <div class="">
                <p class="formrow"><label class="control-label" for="register_email" >上传头像</label>
                    <input type="file"  name="file" id="img">
                    <input type="button" value="上传" name="btn" class="uploadbtn ub1">
                </p>
            </div>
            <br>
            <div>
                <p class="formrow"><label class="control-label" for="register_email" >头像</label>
                    <img src="{{$user['user_image']}}" id="imgs" alt="" width="8%">
                </p>
            </div>
            <div class="loginbtn reg">
                <button type="button" class="uploadbtn ub1" id="btn">确认</button>
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
            size = 1024*100;
            index=1;
            totalPage=0;
            var per=0;
            $("input[name='btn']").click(function(){
                upload(index);
            });
            function upload(index){
                var objfile = document.getElementById("img").files[0];
                var filesize = objfile.size;//文件大小
                var filename = objfile.name;
                var start = (index-1) * size;
                per =((start/filesize)*100).toFixed(2);
                var end = start+size;
                totalPage = Math.ceil(filesize/size);//多少页
                var chunk = objfile.slice(start,end);
                var form = new FormData();
                form.append("file",chunk,filename);
                $.ajax({
                    type : "post",
                    data: form,
                    url : "/index/uploadinfo",
                    processData: false,
                    contentType: false,
                    cache:false,
                    dataType : "json",
                    async:true,//同步
                    success:function(msg){

                        if(index < totalPage ){
                            index++;
                            upload(index);
                        }else{
                            layer.msg('上传成功',{icon:6});
                            $("#imgs").attr('src',msg.msg);
                        }
                    }
                });
            }

            $("#btn").click(function () {
                var email = $("#email").val();
                var name = $("#name").val();
                var user_id = $("#user_id").val();
                var imgs = $("#imgs").attr("src");

                $.ajax({
                    type : 'post',
                    url : '/index/updMessage_do',
                    dataType:"json",
                    data:{email:email,name:name,user_id:user_id,imgs:imgs},
                    success : function (msg) {
                        // console.log(msg);
                        if(msg.code == '200'){
                            layer.msg(msg.message,{icon:6});
                            window.location.href = "/index/my";
                        }else{
                            layer.msg(msg.message,{icon:2});
                        }
                    }
                })
            })



        });
    </script>
@endsection
