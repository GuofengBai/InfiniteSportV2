<?php
/**
 * Created by IntelliJ IDEA.
 * User: baiguofeng
 * Date: 2017/4/10
 * Time: 20:34
 */

session_start();

//检测是否登录，若没登录则转向登录界面
if (!isset($_SESSION['id'])) {
    header("Location:index.html");
    exit();
}
?>
<?php include "head.html"; ?>

    <div class="main-container">
        <div class="padding-md">
            <h3 class="header-text m-bottom-md">
                我的主页

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


                            <h4 class="m-top-md m-bottom-sm">关于我</h4>
                            <p class="m-top-sm" id="l_profile">

                            <p>


                        </div>
                    </div><!-- ./row -->
                </div><!-- ./col -->
                <div class="col-md-9">
                    <div class="smart-widget">
                        <div class="smart-widget-inner">
                            <ul class="nav nav-tabs tab-style2 tab-right bg-grey">
                                <li>
                                    <a href="#profileTab3" data-toggle="tab">
                                        <span class="icon-wrapper"><i class="fa fa-eye"></i></span>
                                        <span class="text-wrapper">我的关注</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#profileTab2" data-toggle="tab">
                                        <span class="icon-wrapper"><i class="fa fa-book"></i></span>
                                        <span class="text-wrapper">修改信息</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#profileTab1" data-toggle="tab">
                                        <span class="icon-wrapper"><i class="fa fa-trophy"></i></span>
                                        <span class="text-wrapper">社交主页</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="smart-widget-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="profileTab1">
                                        <h4 class="header-text m-bottom-md">
                                            我的运动
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
                                                <h4 class="m-top-md">我的活动</h4>

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
                                    <div class="tab-pane fade" id="profileTab2" style="height: 800px">
                                        <h4 class="header-text m-top-md">个人资料</h4>
                                        <form class="form-horizontal m-top-md">


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">id&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="uid" id="uid" type="text" class="form-control"
                                                           value="user0" readonly="readonly" style="width: 60%">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">等级&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="level" id="level" type="number" class="form-control"
                                                           value="" style="width: 60%" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">经验&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="exp" id="exp" type="number" class="form-control"
                                                           value="" style="width: 60%" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">昵称&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="name" id="name" type="text" class="form-control"
                                                           value="唐纳德·特朗普" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">电子邮箱</label>
                                                <div class="col-sm-9">
                                                    <input name="email" id="email" type="text" class="form-control"
                                                           value="" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">地址&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="location" id="location" type="text"
                                                           class="form-control"
                                                           value="" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">职业&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="job" id="job" type="text" class="form-control"
                                                           value="" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">简介&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <textarea name="profile" id="profile" rows="3" class="form-control"
                                                              placeholder="make America great again!"
                                                              style="width: 60%"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group m-top-lg">
                                                <label class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9">
                                                    <button class="btn btn-info m-left-xs" id="submit1">保存</button>
                                                </div>
                                            </div>
                                        </form>
                                        <h4 class="header-text m-top-md">设置头像</h4>
                                        <form class="form-horizontal m-top-md" id="uploadForm">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">上传头像</label>
                                                <div class="col-sm-9">

                                                    <input name="avatar" id="avatar" type="file"
                                                           class="form-control"
                                                           value="" style="width: 60%;">
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-sm-9">
                                                            <button name="submit" class="btn btn-info m-left-xs"
                                                                    onclick="doUpload()">上传
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div><!-- ./tab-pane -->
                                    <div class="tab-pane fade" id="profileTab3">
                                        <div class="profile-follower-list clearfix">
                                            <ul id="following_list">


                                            </ul>
                                        </div><!-- ./profile-follower-list -->
                                    </div><!-- ./tab-pane -->
                                </div><!-- ./tab-content -->
                            </div><!-- ./smart-widget-body -->
                        </div><!-- ./smart-widget-inner -->
                    </div><!-- ./smart-widget -->
                </div>
            </div>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->


<?php include "middle.html"; ?>
    <script>
        $.ajax("/api/user/" + id + "/following/", {
            type: 'GET',
            async: false,
            datatype: 'json',
            success: function (result) {

                data = JSON.parse(result);
                for (i = 0; i < data.length; i++) {
                    $.ajax("/api/user/" + data[i].id, {
                        type: 'GET',
                        async: false,
                        datatype: 'json',
                        success: function (td) {
                            temp = JSON.parse(td);
                            var tb = "<li>" + "<div class=\"panel panel-default clearfix\">" +
                                "<div class=\"panel-body\"> <div class=\"user-wrapper\"> <div class=\"user-avatar\"> <img class=\"small-img img-circle img-thumbnail\" src=" + temp.avatar + "alt=\"\"> </div> <div class=\"user-detail small-img\">" +
                                "<div class=\"font-16\">" + temp.name + "</div>" +
                                "<small class=\"block text-muted font-12\">" + temp.job + "</small>" +
                                "<div class=\"m-top-sm\">" +

                                "<button type=\"button\" class=\"btn btn-info m-left-xs\" data-toggle=\"modal\"><a href=\"user_specific.php?uid=" + temp.id + "\" style='color: inherit'>进入首页</a></button>" +
                                "</div> </div> </div> </div> </div>" + "</li>";
                            $("#following_list").append(tb);
                        }
                    });
                }

            }
        });
    </script>
    <script>
        $.ajax("/api/user/" + id, {
            type: 'GET',
            async: false,
            datatype: 'json',
            success: function (result) {

                data = JSON.parse(result);
                $("#name").val(data.name);
                $("#uid").val(data.id);
                $("#level").val(data.level);
                $("#exp").val(data.exp);
                $("#email").val(data.email);
                $("#profile").val(data.profile);
                $("#job").val(data.job);
                $("#location").val(data.location);
                $("#l_name").append(data.name + "<i class=\"fa fa-circle text-success m-left-xs font-14\"></i>");
                $("#l_email").append("<i class=\"fa fa-external-link user-profile-icon\"></i>" + data.email);
                $("#l_profile").append(data.profile);
                $("#l_job").append("<i class=\"fa fa-briefcase user-profile-icon\"></i>" + data.job);
                $("#l_location").append("<i class=\"fa fa-map-marker user-profile-icon\" ></i>" + data.location);
                $('#l_avatar').append("<img src=" + data.avatar + ">");

            }
        });
        $("#submit1").on("click", function () {
            em = $("#email").val();
            pro = $("#profile").val();
            jo = $("#job").val();
            locatio = $("#location").val();
            nam = $("#name").val();
            val = {
                email: em,
                profile: pro,
                job: jo,
                location: locatio,
                name: nam
            };
            $.ajax("/api/user/" + id, {
                type: 'PUT',
                async: false,
                data: val,
                success: function (result) {
                    alert("更新成功");
                    window.location.href = "profile_new.php";
                }
            });
        });
        function doUpload() {
            var formData = new FormData($("#uploadForm")[0]);
            $.ajax({
                url: '/api/user/' + id + '/avatar/',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    alert(returndata);
                },
                error: function (returndata) {
                    alert(returndata);
                }
            });
        }
    </script>
    <script>
        id = $("#id").text();
        $.ajax("/api/user/" + id + "/sport_record_total", {
            type: 'GET',
            datatype: 'json',
            success: function (result) {
                data = JSON.parse(result);
                $("#t_steps").html(data.t_steps);
                $("#t_miles").html(data.t_miles);
                $("#t_calorie").html(data.t_calorie);
            }
        });
        $.ajax("/api/user/" + id + "/sport_days", {
            type: 'GET',
            datatype: 'json',
            success: function (result) {
                data = JSON.parse(result);
                $("#t_days").html(data.t_days);
            }
        });
        $.ajax("/api/user/" + id + "/activity_todo/", {
            type: 'GET',
            datatype: 'json',
            success: function (result) {
                data = JSON.parse(result);
                $("#a_uncomplete").html(data.length);
            }
        });
        $.ajax("/api/user/" + id + "/activity/", {
            type: 'GET',
            datatype: 'json',
            success: function (result) {
                data = JSON.parse(result);
                $("#a_join").html(data.length);
            }
        });
        $.ajax("/api/user/" + id + "/following/", {
            type: 'GET',
            datatype: 'json',
            success: function (result) {
                data = JSON.parse(result);
                $("#w_number").html(data.length);
            }
        });
        $.ajax("/api/user/" + id + "/weekly_rank/", {
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

                    $.ajax("/api/user/" + id + "/sport_record_weekly", {
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
    </script>

<?php include "end.html"; ?>