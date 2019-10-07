@extends('admin.first')
@section('title','资讯分类添加')

@section('content')
    <h3>资讯分类添加</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">资讯分类名称</label>
            <input type="text" class="form-control" id="title" placeholder="请填写资讯分类名称">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择权重等级</label>
            <select class="form-control" name="weight" id="weight">
                <option value="">请选择权重等级</option>
                <option value="1">一级权重</option>
                <option value="2">二级权重</option>
                <option value="3">三级权重</option>
                <option value="4">四级权重</option>
                <option value="5">五级权重</option>
            </select>
        </div>



        <button type="button" class="btn btn-success" >创建分类</button>
    </form>


    <script>
        $(function(){
            layui.use('layer', function () {
                var layer = layui.layer;
                $(".btn-success").click(function () {
                    var title = $("#title").val();
                    var weight = $("#weight").val();

                    $.post(
                            '/admin/addbar',
                            {title: title, weight: weight},
                            function (res) {
                                if (res.error == 10001) {
                                    layer.msg(res.msg,{icon:6});
                                    location.href = ''
                                } else {
                                    layer.msg(res.msg,{icon:2});
                                }
                            }, 'json'
                    );
                });
            });
        });
    </script>
@endsection