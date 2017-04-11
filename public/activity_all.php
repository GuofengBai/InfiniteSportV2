<?php

    session_start();

    //检测是否登录，若没登录则转向登录界面
    if(!isset($_SESSION['id'])){
        header("Location:index.html");
        exit();
    }
?>
    <?php include "head.html";?>
    <head>
        <link href="css/activity.css" rel="stylesheet">
    </head>

    <div class="main-container">
        <div class="padding-md">
            <h2 class="header-text">
                活动列表
                <span class="sub-header">

						</span>
            </h2>
            <table class="table table-striped" id="dataTable">
                <thead>
                <tr>
                    <th>活动名</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>奖励</th>
                    <th>发起人</th>
                </tr>
                </thead>
                <tbody id="a_list">
                <tr>

                </tr>

                </tbody>

            </table>
            <div>
                <ul class="pagination" style="margin-left: 35%">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div><!-- ./padding-md -->

	</div><!-- /main-container -->
    <?php include "middle.html";?>
    /*此处写js代码*/
    <script>
        $(function()	{
            $('#dataTable').dataTable();
        });
    </script>

    <script>
        $.ajax("/api/activity/", {
            type: 'GET',
            success: function (result) {
                data=JSON.parse(result);
                for(i=0;i<data.length;i++){
                    var tb="<tr>"+
                        "<td>"+
                        "<a href=\"activity_specific.php?aid="+data[i].id+"\" style=\"font-weight: bold\">"+data[i].name+"</a>"+
                        "</td>"+
                        "<td>"+data[i].start_date+"</td>"+
                        "<td>"+data[i].end_date+"</td>"+
                        "<td>"+data[i].bonus+"</td>"+
                        "<td>"+ "<a href=\"user_specific.php?uid="+data[i].creator+"\"style=\"font-weight: bold\">"+data[i].creator+"</a>"+"</td>"+
                        "</tr>";
                    $("#a_list").append(tb);
                }

            }
        });
    </script>

    <?php include "end.html";?>