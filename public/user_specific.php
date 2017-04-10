<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['id'])){
    header("Location:index.html");
    exit();
}
?>
<?php include "head.html";?>

    <div class="main-container">
        <div class="padding-md">
            <h3 class="header-text m-bottom-md">
                TA的主页

            </h3>

            <div class="row user-profile-wrapper">
                <div class="col-md-3 user-profile-sidebar m-bottom-md">
                    <div class="row">
                        <div class="col-sm-4 col-md-12">
                            <div class="user-profile-pic">
                                <div class="image image-full" id="l_avatar"></div>
                                <div class="ribbon-wrapper">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12" style="font-size: 1.5rem">
                            <div class="user-name m-top-sm" id="l_name"></div>

                            <div class="m-top-sm">
                                <a id="l_location">

                                </a>

                                <div class="m-top-sm" id="l_job">

                                </div>

                                <div class="m-top-sm" id="l_email">

                                </div>
                            </div>


                            <h4 class="m-top-md m-bottom-sm">关于TA</h4>
                            <p class="m-top-sm" id="l_profile">

                            <p>
                            <br>
                            <br>
                            <div class="m-top-sm text-centers">
                                <button class="btn btn-info" id="submit">关注</button>
                            </div>
                        </div>
                    </div><!-- ./row -->
                </div><!-- ./col -->
                <div class="col-md-9">
                    <div class="smart-widget">
                        <div class="smart-widget-inner">

                            <div class="smart-widget-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="profileTab1">
                                        <h4 class="header-text m-bottom-md">
                                            TA的运动
                                        </h4>
                                        <div class="row" style="font-size: 1.5rem">
                                            <div class="col-sm-3 col-sm-6s">
                                                <div class="widget-stat3 bg-danger">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-fire fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">燃烧卡路里</div>
                                                    <div class="text-center" id="t_calorie"></div>
                                                </div>
                                            </div><!-- ./col -->
                                            <div class="col-sm-3 col-sm-6s">
                                                <div class="widget-stat3 bg-warning">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-retweet fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">运动总步数</div>
                                                    <div class="text-center" id="t_steps"></div>
                                                </div>
                                            </div><!-- ./col -->
                                            <div class="col-sm-3 col-sms-6">
                                                <div class="widget-stat3 bg-info">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-location-arrow fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">运动总距离</div>
                                                    <div class="text-center" id="t_miles"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-sm-6s">
                                                <div class="widget-stat3 bg-primary">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">运动总天数</div>
                                                    <div class="text-center" id="t_days"></div>
                                                </div>
                                            </div>
                                        </div><!-- ./row -->

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4 class="m-top-md">TA的活动</h4>

                                                <div class="row m-top-md">
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-primary">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-circle-o fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">参加的活动</div>
                                                            <div class="text-center" id="a_join"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-info">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-spinner fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">进行的活动</div>
                                                            <div class="text-center" id="a_uncomplete"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                </div>
                                            </div><!-- ./col -->
                                            <div class="col-lg-6">
                                                <h4 class="m-top-md">朋友圈</h4>

                                                <div class="row m-top-md">
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-primary">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-users fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">好友数</div>
                                                            <div class="text-center" id="w_number"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-info">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-signal fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">朋友圈排名</div>
                                                            <div class="text-center" id="w_rank"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                </div>
                                                <div class="panel panel-default m-top-md">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-twitter"></i> 周排名
                                                    </div>
                                                    <ul class="list-group" id="friend_rank">

                                                    </ul><!-- /list-group -->
                                                </div><!-- ./panel -->


                                            </div><!-- ./col -->
                                        </div><!-- ./row -->
                                    </div><!-- ./tab-pane -->

                                </div><!-- ./tab-content -->
                            </div><!-- ./smart-widget-body -->
                        </div><!-- ./smart-widget-inner -->
                    </div><!-- ./smart-widget -->
                </div>
            </div>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
<?php include "middle.html";?>



<script>
    var str = window.location.search;
    var index = str.indexOf("=");
    var uid = str.substring(index + 1);
    $.ajax("/api/user/" + uid, {
        type: 'GET',
        async: false,
        datatype: 'json',
        success: function (result) {

            data = JSON.parse(result);

            $("#l_name").append(data.name + "<i class=\"fa fa-circle text-success m-left-xs font-14\"></i>");
            $("#l_email").append("<i class=\"fa fa-external-link user-profile-icon\"></i>" + data.email);
            $("#l_profile").append(data.profile);
            $("#l_job").append("<i class=\"fa fa-briefcase user-profile-icon\"></i>" + data.job);
            $("#l_location").append("<i class=\"fa fa-map-marker user-profile-icon\" ></i>" + data.location);
            $('#l_avatar').append("<img src=" + data.avatar + ">");
        }
    });

</script>
<script>
    id = $("#id").text();
    $.ajax("/api/user/" + uid + "/sport_record_total", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#t_steps").html(data.t_steps);
            $("#t_miles").html(data.t_miles);
            $("#t_calorie").html(data.t_calorie);
        }
    });
    $.ajax("/api/user/" + uid + "/sport_days", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#t_days").html(data.t_days);
        }
    });
    $.ajax("/api/user/" + uid + "/activity_todo/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#a_uncomplete").html(data.length);
        }
    });
    $.ajax("/api/user/" + uid + "/activity/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#a_join").html(data.length);
        }
    });
    $.ajax("/api/user/" + uid + "/following/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#w_number").html(data.length);
        }
    });
    $.ajax("/api/user/" + uid + "/weekly_rank/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            for (i = 0; i < data.length; i++) {
                var td = "<li><p>" +
                    data.id + "</p></li>";
                $("#friend_rank").append(td);
            }
            if (data.length == 0) {
                $("#w_rank").html(1);
            } else {

                $.ajax("/api/user/" + uid + "/sport_record_weekly", {
                    type: 'GET',
                    datatype: 'json',
                    success: function (result) {
                        data1 = JSON.parse(result);
                        rank = 1;
                        for (i = 0; i < data.length; i++) {
                            if (data[i].w_steps > data1.w_steps) {
                                rank++;
                            }
                        }
                        $("#w_rank").html(rank);
                    }
                });
            }
        }
    });
    $.ajax("/api/user/"+id+"/following/", {
        type: 'GET',
        async:false,
        datatype:'json',
        success: function (result) {

            data=JSON.parse(result);

            fo=0;

            for(i=0;i<data.length;i++){
                if(uid==data[i].id){
                    fo=1;
                    break;
                }
            }

            if(fo==0){
                $("#submit").html("关注");
                $("#submit").on("click",function () {
                    $.ajax("/api/user/"+id+"/following/", {
                        type: 'POST',
                        data: {followingid:uid},
                        async:false,
                        success: function (result) {
                            data=JSON.parse(result);
                            if(data.status=="false"){
                                alert(data.detail);
                            }else{
                                window.location.href="user_specific.php?uid="+uid;
                            }
                        }
                    });
                });
            }else{
                $("#submit").html("取消关注");
                $("#submit").on("click",function () {
                    $.ajax("/api/user/"+id+"/following/", {
                        type: 'DELETE',
                        data: {followingid:uid},
                        async:false,
                        success: function (result) {
                            window.location.href="user_specific.php?uid="+uid;
                        }
                    });
                });
            }

        }
    });
</script>
<?php include "end.html";?>