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
        header("Location:login.html");
        exit();
    }
?>
    <?php include "head.html";?>

    <div class="main-container">
        <div class="padding-md">
            <h3 class="header-text m-bottom-md">
                用户搜索

            </h3>


            <div class="col-md-12">
                <div class="smart-widget">
                    <div class="smart-widget-inner">

                        <div class="smart-widget-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="profileTab1">
                                    <div>
                                        <input type="text" id="user_search" placeholder="请输入搜索的用户名" style="width: 30%"
                                               class="form-control input-md inline-block">
                                        <br><br>
                                        <button class="btn btn-info m-left-xs" id="submit">搜索</button>
                                    </div>
                                    <div class="profile-follower-list clearfix">
                                        <ul class="list-group" id="search_list">

                                        </ul>
                                    </div>
                                </div><!-- ./tab-pane -->

                            </div><!-- ./tab-content -->
                        </div><!-- ./smart-widget-body -->
                    </div><!-- ./smart-widget-inner -->
                </div><!-- ./smart-widget -->
            </div>
        </div>
    </div>


    <?php include "middle.html";?>
    <script>

        var str = window.location.search;
        var index = str.indexOf("=");

        var search = str.substring(index + 1);
        if (search != null && search != "") {
            val = {
                to_search: search
            };

            $.ajax("/api/user/search", {
                type: 'POST',
                data: val,
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
                                    "<div class=\"panel-body\"> <div class=\"user-wrapper\"> <div class=\"user-avatar\"> <img class=\"small-img img-circle img-thumbnail\" src=\"images/profile/profile4.jpg\" alt=\"\"> </div> <div class=\"user-detail small-img\">" +
                                    "<div class=\"font-16\">" + temp.name + "</div>" +
                                    "<small class=\"block text-muted font-12\">" + temp.job + "</small>" +
                                    "<div class=\"m-top-sm\">" +

                                    "<button type=\"button\" class=\"btn btn-info m-left-xs\" data-toggle=\"modal\"><a href=\"user_specific.php?uid=" + temp.id + "\" style='color: inherit'>进入首页</a></button>" +
                                    "</div> </div> </div> </div> </div>" + "</li>";
                                $("#search_list").append(tb);
                            }
                        });
                    }

                }
            });
        }
        $("#submit").on("click", function () {
            search = $("#user_search").val();
            window.location.href = "user_search.html?search=" + search;
        });
    </script>

    <?php include "end.html";?>