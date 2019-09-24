<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - jqGird</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <!-- jqgrid-->
    <link href="css/plugins/jqgrid/ui.jqgrid.css?0820" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">

    <style>
        /* Additional style to fix warning dialog position */

        #alertmod_table_list_2 {
            top: 900px !important;
        }
    </style>

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>jQuery Grid Plugin – jqGrid</h5>
                </div>
                <div class="ibox-content">
                    <hr>
                    <h4>讲师列表</h4>

                    <div class="jqGrid_wrapper">
                        <table id="table_list_1"></table>
                        <div id="pager_list_1"></div>
                    </div>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>



<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>

<!-- jqGrid -->
<script src="js/plugins/jqgrid/i18n/grid.locale-cn.js?0820"></script>
<script src="js/plugins/jqgrid/jquery.jqGrid.min.js?0820"></script>

<!-- 自定义js -->
<script src="js/content.js?v=1.0.0"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {
        var data = {};
        $.ajax({
            url : "/admin/lecturerLists",
            type : "get",
            dataType : "JSON",
            success : function (res) {
                data = res.data;
                list(data);
            }

        });

        // Examle data for jqGrid


    });
    function list(data) {
        $.jgrid.defaults.styleUI = 'Bootstrap';
        var mydata = data;

        // Configuration for jqGrid Example 1
        $("#table_list_1").jqGrid({
            data: mydata,
            datatype: "local",
            height: 100,
            autowidth: true,
            shrinkToFit: true,
            rowNum: 3,
            rowList: [5, 20, 30],
            colNames: ['序号', '日期', '姓名', '权重'],
            colModel: [
                {
                    name: 'lect_id',
                    index: 'lect_id',
                    width: 60,
                    sorttype: "int"
                },
                {
                    name: 'utime',
                    index: 'date(Y-m-d),utime',
                    width: 90,
                    sorttype: "date",
                    formatter: "date"
                },
                {
                    name: 'lect_name',
                    index: 'lect_name',
                    width: 100
                },
                {
                    name: 'lect_weight',
                    index: 'lect_weight',
                    width: 80,
                    align: "right",
                },
            ],
            pager: "#pager_list_1",
            viewrecords: true,
            caption: "jqGrid 示例1",
            hidegrid: false
        });

        // Configuration for jqGrid Example 2
        $("#table_list_2").jqGrid({
            data: mydata,
            datatype: "local",
            height: 450,
            autowidth: true,
            shrinkToFit: true,
            rowNum: 20,
            rowList: [10, 20, 30],
            colNames: ['序号', '日期', '客户', '金额', '运费', '总额', '备注'],
            colModel: [
                {
                    name: 'id',
                    index: 'id',
                    editable: true,
                    width: 60,
                    sorttype: "int",
                    search: true
                },
                {
                    name: 'invdate',
                    index: 'invdate',
                    editable: true,
                    width: 90,
                    sorttype: "date",
                    formatter: "date"
                },
                {
                    name: 'name',
                    index: 'name',
                    editable: true,
                    width: 100
                },
                {
                    name: 'amount',
                    index: 'amount',
                    editable: true,
                    width: 80,
                    align: "right",
                    sorttype: "float",
                    formatter: "number"
                },
                {
                    name: 'tax',
                    index: 'tax',
                    editable: true,
                    width: 80,
                    align: "right",
                    sorttype: "float"
                },
                {
                    name: 'total',
                    index: 'total',
                    editable: true,
                    width: 80,
                    align: "right",
                    sorttype: "float"
                },
                {
                    name: 'note',
                    index: 'note',
                    editable: true,
                    width: 100,
                    sortable: false
                }
            ],
            pager: "#pager_list_2",
            viewrecords: true,
            caption: "jqGrid 示例2",
            add: true,
            edit: true,
            addtext: 'Add',
            edittext: 'Edit',
            hidegrid: false
        });

        // Add selection
        $("#table_list_2").setSelection(4, true);


        // Setup buttons
        $("#table_list_2").jqGrid('navGrid', '#pager_list_2', {
            edit: true,
            add: true,
            del: true,
            search: true
        }, {
            height: 200,
            reloadAfterSubmit: true
        });

        // Add responsive to jqGrid
        $(window).bind('resize', function () {
            var width = $('.jqGrid_wrapper').width();
            $('#table_list_1').setGridWidth(width);
            $('#table_list_2').setGridWidth(width);
        });
    }
</script>




</body>

</html>
