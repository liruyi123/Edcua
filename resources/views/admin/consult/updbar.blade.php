@extends('admin.first')
@section('title','资讯分类修改')

@section('content')
    <h3>资讯分类修改</h3><br/>
    <form>
        <input type="hidden" id="nid" value="{{$data->navbar_id}}">
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">资讯分类名称</label>
            <input type="text" class="form-control" id="title" value="{{$data->ntitle}}">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择权重等级</label>
            <select class="form-control" name="weight" id="weight">
                <option value="{{$data->weight}}">
                    @if($data->weight==1)一级权重
                    @elseif($data->weight==2)二级权重
                    @elseif($data->weight==3)三级权重
                    @elseif($data->weight==4)四级权重
                    @elseif($data->weight==5)五级权重
                    @else顶级权重
                    @endif
                </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>



        <button type="button" class="btn btn-success" >修改分类</button>
    </form>


    <script>
        $(function(){
            $(".btn-success").click(function () {
                var title = $("#title").val();
                var weight = $("#weight").val();
                var nid = $("#nid").val();

                $.post(
                        '/admin/updbar',
                        {title:title,weight:weight,nid:nid},
                        function(res){
                            if(res.error==10001){
                                alert(res.msg);
                                location.href='/admin/navcon'
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            })
        });
    </script>
@endsection