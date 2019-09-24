@extends('admin.first')
@section('title','添加上下导航栏')

@section('content')

    <div class="col-md-12">
        <div class="form-group">
            <h3>课程分类名称：</h3>
            <br>
            <div class="col-sm-5">
                <input type="text" id="c_name" class="form-control" placeholder="Course Category Name">
            </div>
        </div>
        <br>
        <br>
        <br>
        <h3>所属课程分类：</h3>
        <br>
        <div class="col-sm-5">
            <select class="form-control" name="" id="navbar">
                <option value="0">Course Category Name</option>
                @foreach($data as $k=>$v)
                    <option value="{{$v['cate_id']}}">{{$v['cate_name']}}</option>
                    @endforeach
            </select>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="form-group">
            <h3>权重大小：</h3>
            <br>
            <div class="col-sm-5">
                <input type="text" id="c_size" class="form-control" placeholder="Weight">
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="form-group">
            <div class="col-sm-5">
                <label class="radio-inline">
                    <input type="radio" value="1" id="radio" name="optionsRadios">展示
                </label>
                <label class="radio-inline">
                    <input type="radio" value="2" id="radio" name="optionsRadios">隐藏
                </label>
            </div>
        </div>
        <br>
        <br>
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
        $(function () {


            $('#btn').click(function () {
                var c_name = $("#c_name").val();
                var c_size = $("#c_size").val();
                var type = $('input:radio:checked').val();
                var navbar = $("#navbar").find("option:selected").val();

                $.ajax({
                    type : 'post',
                    url : 'courseCategoryAdd_do',
                    data:{c_name:c_name,navbar:navbar,c_size:c_size,type:type},
                    success : function (msg) {
                            // console.log(msg);
                        if(msg.status == '200'){
                            alert(msg.data);
                            window.location.href = "courseCategoryList";
                        }else{
                            alert(msg.data);
                        }
                    }
                })

            })
        })
    </script>

@endsection