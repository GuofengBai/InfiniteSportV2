<?php
/**
 * Created by IntelliJ IDEA.
 * User: baiguofeng
 * Date: 2017/4/10
 * Time: 20:34
 */

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
        <link href="css/pnotify.custom.min.css" media="all" rel="stylesheet" type="text/css" />
    </head>

    <div class="main-container">
        <div class="padding-md">
            <h2 class="header-text">
                新建活动
                <span class="sub-header">

						</span>
            </h2>
            <div class="smart-widget m-top-lg widget-dark-blue">
                <div class="smart-widget-header">

                    <span style="font-size: 18px">新建活动详情</span>

                </div>
                <div class="smart-widget-inner">
                    <div class="smart-widget-hidden-section">
                        <ul class="widget-color-list clearfix">
                            <li style="background-color:#20232b;" data-color="widget-dark"></li>
                            <li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>
                            <li style="background-color:#23b7e5;" data-color="widget-blue"></li>
                            <li style="background-color:#2baab1;" data-color="widget-green"></li>
                            <li style="background-color:#edbc6c;" data-color="widget-yellow"></li>
                            <li style="background-color:#fbc852;" data-color="widget-orange"></li>
                            <li style="background-color:#e36159;" data-color="widget-red"></li>
                            <li style="background-color:#7266ba;" data-color="widget-purple"></li>
                            <li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>
                            <li style="background-color:#fff;" data-color="reset"></li>
                        </ul>
                    </div>
                    <div class="smart-widget-body">
                        <form class="form-horizontal m-top-md">
                            <div class="form-group">
                                <label class="col-sm-2 control-label before2">活动名称</label>
                                <div class="col-sm-10" >
                                    <input type="text" class="form-control after2" id="aname" required="required" maxlength="10" style="width:300px">
                                </div>
                            </div><!-- /form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label before2">开始时间</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control after2" id="astart" required="required" style="width:300px">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label before2">结束时间</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control after2" id="aend" required="required" style="width:300px">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label before2">活动奖励</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control after2" required="required" id="abonus"  maxlength="10" style="width:300px">

                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label " style="text-align: left"><a href="system_info.php">奖励是什么？</a></label>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label before2">活动描述</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control after2" id="adesc" rows="5" style="width:85%"></textarea>
                                </div>
                            </div>
                            <span style="display: none" id="uid"><?php echo $_SESSION["id"]?></span>
                            <button  class="btn btn-success btn-sm short" id="submit" style="margin-left: 80%">提交</button>
                        </form>
                    </div>
                </div><!-- ./smart-widget-inner -->
            </div><!-- ./smart-widget -->
        </div><!-- ./padding-md -->

	</div><!-- /main-container -->
    <?php include "middle.html";?>
    /*此处写js代码*/
    <script src='js/pnotify.custom.min.js'></script>

    <script>
        id=$("#uid").text();
        $("#submit").on("click", function () {
            an=$("#aname").val();
            ab=$("#abonus").val();
            sd=$("#astart").val();
            ed=$("#aend").val();
            des=$("#adesc").val();
            val={
                name:an,
                bonus:ab,
                start_date:sd,
                end_date:ed,
                description:des
            };
            $.ajax("/api/activity/", {
                type: 'POST',
                data: val,
                async:false,
                datatype:'json',
                success: function (result) {
                    window.location.href="my_activity.php";
                    window.event.returnValue = false;

                }

            });

        });
    </script>

    <?php include "end.html";?>