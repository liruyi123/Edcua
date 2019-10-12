@extends('admin.first')
@section('title','资讯分类添加')
<link rel="stylesheet" href="/static/build/layui.css" media="all">
@section('content')
    <h3>课程视频添加</h3><br/>
    <form>
        <div class="form-group" style="width: 500px;">
            <label for="exampleInputEmail1">选择上传的视频类型</label>
            <div class="form-group">
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" value="1" id="radio" name="optionsRadios" class="type" style="float: right">课程
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" id="radio" name="optionsRadios" class="type" style="float: left">课时
                    </label>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="form-group" style="width: 300px;display: none" id="cate">
            <label for="exampleInputEmail1">选择课程</label>
            <select class="form-control" name="" id="cour">
                <option value="0">choose your courses</option>
                @foreach($cour as $k=>$v)
                    <option value="{{$v['cou_id']}}" class="id">{{$v['cou_name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" style="width: 300px;display: none" id="cata">
            <label for="exampleInputEmail1">选择课时</label>
            <select class="form-control" name="" id="cates">
                <option value="0">Choose class</option>
                @foreach($cata as $ke=>$ve)
                    @foreach($ve['son'] as $kk => $vv)
                        @foreach($vv['son'] as $key => $val)
                            <optgroup label="{{$ve['cou_name']}}">
                                <optgroup label="{{$ve['cata_name']}}">
                                    <optgroup label="{{$vv['cata_name']}}">
                                        <option value="{{$val['cata_id']}}" class="id">{{$val['cata_name']}}</option>
                                    </optgroup>
                                </optgroup>
                            </optgroup>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择视频</label>
            <p>
                <button type="button" class="layui-btn" id="test1">
                    <i class="layui-icon">&#xe67c;</i>上传视频
                </button>
                <video width="300px" id="img" style="display: none" video_url="" src="" class="video-js vjs-default-skin  vjs-big-play-centered vvi " controls   poster="https://www.qzyphp.top/questionbankimg/ae326b9767efb40d540befa7993575cc.jpg" data-setup="{}">
                </video>
            </p>
        </div>
        <br>
        <br>
        <button type="button" class="btn btn-success" id="btn">确认添加</button>
    </form>
    @endsection
@section("js")
    <script src="/static/build/layui.js"></script>
    <script>
        layui.use(['upload',"layer"], function(){
            var upload = layui.upload;
            var layer = layui.layer;
            //执行实例
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                ,url: '/admin/upload' //上传接口
                ,accept : "images,video,audio,file"
                ,exts : 'mp4'
                ,data : "entity"
                ,done: function(res){
                    // if(res.code == 200){
                        $("#img").prop("src",res.data.src);
                        $("#img").attr("video_url",res.data.src);
                        $("#img").show();
                    // }
                    //上传完毕回调
                }
                ,error: function(arr){
                    console.log(arr);
                    //请求异常回调
                }
            });
        });
        $(document).on("click",".type",function () {
            var type = $(this).val();
            if(type ==1){
                $("#cate").show();
                $("#cata").hide();
            }else{
                $("#cata").show();
                $("#cate").hide();
            }
        })
        $(document).on("click","#btn",function () {
            var type = $(".type");
            var id = '';
            var img = $("#img").attr("video_url");
            type.each(function (index) {
                // console.log($(this).attr("checked"));
                if($(this).attr('checked') == "checked"){
                    id =$(this).val();
                }
            })
            var cou_id = "";
            if(id == 1){
                cou_id = $("#cour").val();
            }else if(id == 2){
                cou_id = $("#cates").val();
            }
            if(id == ""){
                layer.msg("请选择要上传的视频的分类！",{icon:2});
                return false;
            }
            if(cou_id <=0){
                layer.msg("请选择要上传的视频的分类！",{icon:2});
                return false;
            }
            if(img == ""){
                layer.msg("请选择要上传的视频！",{icon:2});
                return false;
            }
            $.ajax({
                url : "/admin/videoDo",
                type : "POST",
                data : {id:id,cou_id:cou_id,img:img},
                dataType : "JSON",
                success : function (res) {
                    if(res.code == 200){
                        layer.msg(res.message,{icon:1});
                        history.go(0);
                    }else{
                        layer.msg(res.message,{icon:2});
                        history.go(0);
                    }

                }
            });
        })
    </script>
@endsection