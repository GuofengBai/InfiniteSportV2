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
                活动详情
                <span class="sub-header">

						</span>
            </h2>
            <span style="display: none" id="uid"><?php echo $_SESSION["id"]?></span>
            <div class="smart-widget m-top-lg widget-dark-blue">
                <div class="smart-widget-header">
                    <span id="aname" style="font-size: 18px">活动名</span>
                </div>
                <div class="smart-widget-inner">

                    <div class="smart-widget-body">
                        <form class="form-horizontal m-top-md">
                            <div class="form-group">
                                <label class="col-lg-2 control-label before" style="width: 120px">发起人</label>
                                <label class="col-lg-10 control-label after" ><a id="acreator">用户1</a></label>

                            </div><!-- /form-group -->

                            <div class="form-group">
                                <label class="col-lg-2 control-label before" style="width: 120px">开始时间</label>
                                <label class="col-lg-4 control-label after"style="width: 150px"><p class="form-control-static" id="sdate">2017-4-9</p></label>
                                <label class="col-lg-2 control-label before" style="width: 120px">结束时间</label>
                                <label class="col-lg-4 control-label after"style="width: 150px"><p class="form-control-static" id="edate">2017-4-10</p></label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label before" style="width: 120px">活动奖励</label>
                                <label class="col-lg-10 control-label after"><p class="form-control-static" id="bonus" >100</p></label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label before"  style="width: 120px">活动描述</label>
                                <label class="col-lg-10 control-label after">
                                    <p class="form-control-static " id="adesc"  >啊啊啊啊啊啊啊</p>
                                </label>
                            </div>

                            <button type="submit" class="btn  btn-sm pull-right short" style="margin-right: 10%" id="submit">参与</button>
                        </form>
                        <br/>
                        <h4 class="m-bottom-md">
                            <i class="fa fa-trophy"></i>
                            参与者
                        </h4>
                        <table class="table table-striped" id="dataTable">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>用户名</th>
                                <th>步数</th>
                            </tr>
                            </thead>
                            <tbody id="j_list">
                            <tr>

                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div><!-- ./smart-widget-inner -->
            </div><!-- ./smart-widget -->
        </div><!-- ./padding-md -->

    </div><!-- /main-container -->
<?php include "middle.html";?>
    /*此处写js代码*/
    <script>

                var str = window.location.search;
                var index = str.indexOf("=");
                var aid = str.substring(index + 1);
                aid=parseInt(aid);
                var uid=$("#uid").text();
                $.ajax("/api/activity/"+aid, {
                    type: 'GET',
                    async:false,
                    success: function (result) {
                        data=JSON.parse(result);
                        $("#aname").html(data.aname);
                        $("#acreator").html(data.creator);
                        $("#acreator").attr("href","user_specific.php?uid="+data.creator);
                        $("#sdate").html(data.start_date);
                        $("#edate").html(data.end_date);
                        $("#bonus").html(data.bonus);
                        $("#adesc").html(data.description);

                        var ty=0;
                        if(uid==data.creator){
                            ty=1;
                            $("#submit").html("<i class=\"fa fa-trash-o\"></i>&nbsp删除活动");
                            $("#submit").addClass("btn-danger");
                            $("#submit").on("click",function () {
                                $.ajax("/api/activity/"+aid, {
                                    type: 'DELETE',
                                    async:false,
                                    success: function (result) {
                                        window.location.href="my_activity.php";
                                    }
                                });
                            });
                        }

                        $.ajax("/api/activity/"+aid+"/joiner/", {
                            type: 'GET',
                            async:false,
                            success: function (result) {
                                data=JSON.parse(result);

                                if(ty==0){
                                    ty=3;
                                    for(i=0;i<data.length;i++){
                                        if(uid==data[i].id){
                                            ty=2;
                                            break;
                                        }
                                    }
                                }
                                if(ty==2){
                                    $("#submit").html("<i class=\"fa fa-sign-out\"></i>&nbsp退出活动");
                                    $("#submit").addClass("btn-warning");
                                    $("#submit").on("click",function () {
                                        $.ajax("/api/user/"+uid+"/activity/"+aid, {
                                            type: 'DELETE',
                                            async:false,
                                            success: function (result) {
                                                window.location.href="my_activity.php";
                                            }
                                        });
                                    });
                                }else if(ty==3){
                                    $("#submit").html("<i class=\"fa fa-sign-in\"></i>&nbsp加入活动");
                                    $("#submit").addClass("btn-success");
                                    $("#submit").on("click",function () {
                                        $.ajax("/api/user/"+uid+"/activity/", {
                                            type: 'POST',
                                            data:{a_id:aid},
                                            async:false,
                                            success: function (result) {
                                                data=JSON.parse(result);
                                                if(data.status=="ok"){
                                                    window.location.href="my_activity.php";
                                                }else {
                                                    alert(data.detail);
                                                }
                                            }
                                        });
                                    });
                                }

                                for(i=0;i<data.length;i++){
                                    var tb="<tr>"+
                                        "<td>"+(i+1)+"</td>"+
                                        "<td>"+ "<a href=\"user_specific.php?uid="+data[i].id+"\">"+data[i].id+"</a>"+"</td>"+
                                        "<td>"+ data[i].t_steps+"</td>"+
                                        "</tr>";
                                    $("#j_list").append(tb);
                                }
                            }
                        });

                    }
                });



    </script>

<?php include "end.html";?>