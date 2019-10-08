@extends('admin.first')
@section('title','修改节点')

@section('content')

    <div class="col-md-12">
        <input type="hidden" value="{{$arr['node_id']}}" id="a_id">
        <div class="form-group">
            <h3>节点名称：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_name" class="form-control" placeholder="Node Name" value="{{$arr['node_name']}}">
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <h3>节点路径：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_url" class="form-control" placeholder="Node Url" value="{{$arr['node_url']}}">
            </div>
        </div>
        <br>
        <br>
        <h3>所属节点：</h3>
        <div class="col-sm-5">
            <select class="form-control" name="" id="node">

                <option value="0">Node Name</option>
                @foreach($data as $k=>$v)
                    @if($arr['pid'] == $v['node_id'])
                        <option value="{{$v['node_id']}}" selected>{{$v['node_name']}}</option>
                    @else
                        <option value="{{$v['node_id']}}">{{$v['node_name']}}</option>
                    @endif
                    @foreach($v['son'] as $kk=>$vv)
                            @if($arr['pid'] == $vv['node_id'])
                                <option value="{{$vv['node_id']}}" selected >&nbsp;&nbsp;&nbsp;&nbsp;{{$vv['node_name']}}</option>
                            @else
                                <option value="{{$vv['node_id']}}">{{$vv['node_name']}}</option>
                            @endif
                    @endforeach
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <br>

        <div class="form-group">
            <div class="col-sm-5">
                @if($arr['node_show'] == 1)
                    <label class="radio-inline">
                        <input type="radio" value="1" id="radio" checked name="optionsRadios">展示
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" id="radio" name="optionsRadios">隐藏
                    </label>
                @elseif($arr['node_show'] == 2)
                    <label class="radio-inline">
                        <input type="radio" value="1" id="radio"  name="optionsRadios">展示
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
    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                $('#btn').click(function () {
                    var a_name = $("#a_name").val();
                    var a_id = $("#a_id").val();
                    var a_url = $("#a_url").val();
                    var pid = $("#node").find("option:selected").val();
                    var type = $('input:radio:checked').val();
                    $.ajax({
                        type : 'post',
                        url : 'NodeUpd_do',
                        dataType:"json",
                        data:{a_name:a_name,a_url:a_url,pid:pid,type:type,a_id:a_id},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "nodelist";
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