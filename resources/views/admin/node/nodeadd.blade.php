@extends('admin.first')
@section('title','添加节点')

@section('content')

    <div class="col-md-12">
        <div class="form-group">
            <h3>节点名称：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_name" class="form-control" placeholder="Node Name">
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <h3>节点路径：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_url" class="form-control" placeholder="Node Url">
            </div>
        </div>
        <br>
        <br>
        <h3>所属节点：</h3>
        <div class="col-sm-5">
            <select class="form-control" name="" id="node">
                <option value="0">Node Name</option>
                @foreach($data as $k=>$v)
                    <option value="{{$v['node_id']}}">{{$v['node_name']}}</option>
                    @foreach($v['son'] as $kk=>$vv)
                        <option value="{{$vv['node_id']}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$vv['node_name']}}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <br>

        <div class="form-group">
            <div class="col-sm-5">
                <label class="radio-inline">
                    <input type="radio" value="1" checked id="radio" name="optionsRadios">展示
                </label>
                <label class="radio-inline">
                    <input type="radio" value="2" id="radio" name="optionsRadios">隐藏
                </label>
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
                    var a_url = $("#a_url").val();
                    var pid = $("#node").find("option:selected").val();
                    var type = $('input:radio:checked').val();
                    $.ajax({
                        type : 'post',
                        url : 'nodeadd_do',
                        dataType:"json",
                        data:{a_name:a_name,a_url:a_url,pid:pid,type:type},
                        success : function (msg) {
                            console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "nodeadd";
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