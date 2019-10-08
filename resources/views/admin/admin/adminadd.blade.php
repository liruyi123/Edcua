@extends('admin.first')
@section('title','添加管理员')

@section('content')

    <div class="col-md-12">
        <div class="form-group">
            <h3>管理员名称：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_name" class="form-control" placeholder="Admin Name">
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <h3>管理员密码：</h3>
            <div class="col-sm-5">
                <input type="password" id="a_pwd" class="form-control" placeholder="Admin Password">
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <h3>管理员电话：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_tel" class="form-control" placeholder="Admin Tel">
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <h3>管理员邮箱：</h3>
            <div class="col-sm-5">
                <input type="text" id="a_email" class="form-control" placeholder="Admin Email">
            </div>
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
                $('#btn').click(function () {
                    var a_name = $("#a_name").val();
                    var a_pwd = $("#a_pwd").val();
                    var a_email = $("#a_email").val();
                    var a_tel = $("#a_tel").val();
                    $.ajax({
                        type : 'post',
                        url : 'adminadd_do',
                        dataType:"json",
                        data:{a_name:a_name,a_pwd:a_pwd,a_tel:a_tel,a_email:a_email},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "adminlist";
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