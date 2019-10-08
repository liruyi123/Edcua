@extends('admin.first')
@section('title','添加角色')

@section('content')

    <div class="col-md-12">
        <div class="form-group">
            <h3>角色名称：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_name" class="form-control" placeholder="Role Name">
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <h3>选择角色</h3>
            <br>
            @foreach($data as $k=>$v)
                <div class="col-sm-4">
                    <div class="checkbox i-checks">
                        <label>
                            <input type="checkbox" value="" class="fu"> <span style="font-size: 20px;"><i>{{$v['node_name']}}</i></span>
                        </label>
                    </div>
                    @foreach($v['son'] as $kk=>$vv)
                        <div class="checkbox i-checks">
                            <label>
                                <input type="checkbox" value=""> {{$vv['node_name']}}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
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
    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;

                $('.fu').click(function () {

                });

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