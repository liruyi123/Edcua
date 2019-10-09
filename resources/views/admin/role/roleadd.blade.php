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
                <div class="col-sm-3">
                    <div class="checkbox i-checks">
                        <input type="checkbox" value="{{$v['node_id']}}" class="fu"> <span style="font-size: 20px;"><i>{{$v['node_name']}}</i></span>
                        <br>
                        @foreach($v['son'] as $kk=>$vv)
                            <input type="checkbox" value="{{$vv['node_id']}}"> {{$vv['node_name']}}
                            <br>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
                    if ($(this).prop('checked')==true){
                        $(this).siblings().prop('checked',true)
                    } else{
                        $(this).siblings().prop('checked',false)
                    }

                });

                var checked = [];
                $('#btn').click(function () {
                    var a_name = $("#a_name").val();
                    $('input:checkbox:checked').each(function() {
                        checked.push($(this).val());
                    });

                    $.ajax({
                        type : 'post',
                        url : 'roleadd_do',
                        dataType:"json",
                        data:{a_name:a_name,checked:checked},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "roleadd";
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