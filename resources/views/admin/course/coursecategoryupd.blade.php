@extends('admin.first')
@section('title','修改课程分类')

@section('content')
        <input type="hidden" id="cid" value="{{$arr['cate_id']}}">
    <div class="col-md-12">
        <div class="form-group">
            <h3>课程分类名称：</h3>
            <br>
            <div class="col-sm-5">
                <input type="text" id="c_name" class="form-control" placeholder="Course Category Name" value="{{$arr['cate_name']}}">
            </div>
        </div>
        <br>
        <br>
        <h3>所属课程分类：</h3>
        <br>
        <div class="col-sm-5">
            <select class="form-control" name="" id="category">
                <option value="0">Course Category Name</option>
                @foreach($data as $k=>$v)
                    @if($arr['pid'] == $v['cate_id'])
                        <option value="{{$v['cate_id']}}" selected>{{$v['cate_name']}}</option>
                    @elseif($arr['pid'] == 0)
                        <option value="{{$v['cate_id']}}">{{$v['cate_name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <div class="form-group">
            <h3>权重大小：</h3>
            <br>
            <div class="col-sm-5">
                <input type="text" id="c_size" class="form-control" placeholder="Weight" value="{{$arr['cate_weight']}}">
            </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <div class="col-sm-5">
                @if($arr['is_show'] == 1)
                <label class="radio-inline">
                    <input type="radio" value="1" id="radio" checked name="optionsRadios">展示
                </label>
                <label class="radio-inline">
                    <input type="radio" value="2" id="radio" name="optionsRadios">隐藏
                </label>
                    @else
                    <label class="radio-inline">
                        <input type="radio" value="1" id="radio" name="optionsRadios">展示
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" id="radio" checked name="optionsRadios">隐藏
                    </label>
                @endif
            </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <div class="col-sm-5">
                <button type="button" id="btn" class="btn btn-primary block full-width m-b btn-lg">提&nbsp;&nbsp;&nbsp;交</button>
            </div>
        </div>

    </div>

    {{--<script type="text/javascript" src="Editor/release/wangEditor.js"></script>--}}
    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;

                $('#btn').click(function () {
                    var c_name = $("#c_name").val();
                    var cid = $("#cid").val();
                    var c_size = $("#c_size").val();
                    var type = $('input:radio:checked').val();
                    var category = $("#category").find("option:selected").val();

                    $.ajax({
                        type : 'post',
                        url : 'CCGUpd_do',
                        dataType:"json",
                        data:{c_name:c_name,category:category,c_size:c_size,type:type,cid:cid},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "courseCategoryList";
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