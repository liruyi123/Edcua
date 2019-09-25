@extends("admin.first")
<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="css/plugins/footable/footable.core.css" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>讲师列表</h5>

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">选项 01</a>
                            </li>
                            <li><a href="#">选项 02</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <input type="text" class="form-control input-sm m-b-xs" id="filter"
                           placeholder="搜索表格...">

                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                        <thead>
                        <tr>
                            <th>讲师ID</th>
                            <th>讲师姓名</th>
                            <th>讲师权重</th>
                            <th>入职时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k=>$v)
                        <tr class="gradeA">
                            <td>{{$v->lect_id}}</td>
                            <td>{{$v->lect_name}}
                            </td>
                            <td>{{$v->lect_weight}}</td>
                            <td class="center">{{$v->ctime}}</td>
                            <td class="center">
                                <a href="javascript:;" class="upd" lect_id="{{$v->lect_id}}"><i class=""></i> 修改</a>
                                <a href="javascript:;" class="del" lect_id="{{$v->lect_id}}"><i class=""></i> 删除</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>
<script src="js/plugins/footable/footable.all.min.js"></script>

<!-- 自定义js -->
<script src="js/content.js?v=1.0.0"></script>
<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });
    $(document).on("click",".del",function () {
        var id = $(this).attr("lect_id");
        $.ajax({
            url : "/admin/lecturerDel",
            type : "get",
            data : {id,id},
            dataType : "json",
            success : function (res) {
                alert(res.message);
                history.go(0);
            }
        });
    })
    $(document).on("click",".upd",function () {
        var id = $(this).attr("lect_id");
        location.href="/admin/lecturerUpdate?id="+id;
    })

</script>




</body>

</html>
