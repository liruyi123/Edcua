@extends('admin.first')
@section('title','添加课程')

@section('content')

    <div class="col-md-12">
        <div class="form-group">
            <input type="hidden" id="cou_id" value="{{$arr['cou_id']}}">
            <h3>课程名称：</h3>
            <div class="col-sm-5">
                <input type="text" id="c_name" class="form-control" placeholder="Course Name" value="{{$arr['cou_name']}}">
            </div>
        </div>

        <br>
        <br>

        <h3>所属课程分类：</h3>
        <div class="col-sm-5">
            <select class="form-control" name="" id="category">
                <option value="0">Course Category Name</option>
                @foreach($data as $k=>$v)
                    <option value="{{$v['cate_id']}}">{{$v['cate_name']}}</option>
                    @foreach($v['son'] as $kk=>$vv)
                        @if($arr['cate_id'] == $vv['cate_id'])
                        <option value="{{$vv['cate_id']}}" selected >&nbsp;&nbsp;&nbsp;&nbsp;{{$vv['cate_name']}}</option>
                        @else
                            <option value="{{$vv['cate_id']}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$vv['cate_name']}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>

        <br>
        <br>

        <div class="form-group">
            <h3>权重大小：</h3>
            <div class="col-sm-5">
                <input type="text" id="c_size" class="form-control" placeholder="Weight" value="{{$arr['cou_weight']}}">
            </div>
        </div>

        <br>
        <br>

        <div class="form-group">
            <div class="col-sm-5">
                @if($arr['c_is_show'] == 1)
                <label class="radio-inline">
                    <input type="radio" value="1" id="radio" name="optionsRadios" checked>展示
                </label>
                <label class="radio-inline">
                    <input type="radio" value="2" id="radio" name="optionsRadios">隐藏
                </label>
                    @else
                    <label class="radio-inline">
                        <input type="radio" value="1" id="radio" name="optionsRadios" >展示
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" id="radio" name="optionsRadios" checked>隐藏
                    </label>
                    @endif
            </div>
        </div>
        <br>
        <div class="form-group">
            <h3 class="col-sm-12 control-label">轮播图：</h3>
            <br>
            <br>
            <label class="col-sm-5 control-label">
                <input type="file" name="file" id="img" class="form-control">
            </label>
            <div class="col-sm-7 control-label">
                <input type="button" name="btn" value="上&nbsp;&nbsp;&nbsp;&nbsp;传"  class="btn btn-primary  block full-width m-b">
            </div>
            <div>
                <img src="{{$arr['path']}}" alt="" id="imgs" width="70%">
            </div>

        </div>

        <br>
        <br>

        <h3>对应讲师：</h3>
        <div class="col-sm-5">
            <select class="form-control" name="" id="lecturer">
                <option value="0">Lecturer</option>
                @foreach($lecArr as $k=>$v)
                    @if($arr['lect_id'] == $v['lect_id'])
                    <option value="{{$v['lect_id']}}" selected>{{$v['lect_name']}}</option>
                    @else
                        <option value="{{$v['lect_id']}}" selected>{{$v['lect_name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <br>
        <br>

        <div class="form-group">
            <h3>时长大小：</h3>
            <div class="col-sm-5">
                <input type="text" id="l_size" class="form-control" placeholder="The length size" value="{{$arr['cou_duration']}}">
            </div>
        </div>

        <br>
        <div class="form-group">
            <h3>课程详情：</h3>
            <div id="editor"><p>{{$arr['cou_text']}}</p></div>
        </div>

        <br>
        <br>
        <br>

        <div class="form-group">
            <div class="col-sm-5">
                <button type="button" id="btn" class="btn btn-primary block full-width m-b btn-lg">提&nbsp;&nbsp;&nbsp;交</button>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>
    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
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
                        url : "uploadinfo",
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


                $('#btn').click(function () {
                    var c_name = $("#c_name").val();
                    var cou_id = $("#cou_id").val();
                    var c_size = $("#c_size").val();
                    var path = $("#imgs").attr('src');
                    var l_size = $("#l_size").val();
                    var type = $('input:radio:checked').val();
                    var category = $("#category").find("option:selected").val();
                    var lecturer = $("#lecturer").find("option:selected").val();
                    var text = $(".w-e-text").children("p").text();

                    $.ajax({
                        type : 'post',
                        url : 'courseUpd_do',
                        dataType:"json",
                        data:{c_name:c_name,category:category,c_size:c_size,type:type,l_size:l_size,lecturer:lecturer,path:path,text:text,cou_id:cou_id},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "courseList";
                            }else{
                                layer.msg(msg.message,{icon:2});
                            }
                        }
                    })

                })


            });
        });
    </script>

@endsection