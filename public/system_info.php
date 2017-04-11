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
                系统相关
                <span class="sub-header">

						</span>
            </h2>
            <span style="display: none" id="uid"><?php echo $_SESSION["id"]?></span>
            <div class="smart-widget m-top-lg widget-dark-blue">
                <div class="smart-widget-header">
                    <span style="font-size: 18px">奖励与等级说明</span>
                </div>
                <div class="smart-widget-inner">

                    <div class="smart-widget-body">
                        <div>
                            <h4 class="header-text">奖励说明</h4>
                            <h5 class="after">
                                &nbsp&nbsp&nbsp&nbsp奖励就是扣除发起者的经验值，参与活动获得的奖励可以增加增加参与者的经验值。
                            </h5>


                        </div>
                        <br/>
                        <div>
                            <h4 class="header-text">经验说明</h4>
                            <h5 class="after">
                                &nbsp&nbsp&nbsp&nbsp经验值可通过上传数据、参加活动获得奖励等获得，在发起活动设置奖励时扣除相应的量。
                            </h5>
                            <br/>
                            <table class="table table-striped" style="width: 60%">
                                <thead>
                                <tr>
                                    <th>操作</th>
                                    <th>经验</th>
                                </tr>
                                </thead>
                                <tbody >
                                <tr>
                                    <td>上传运动数据</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>参加活动</td>
                                    <td>与活动奖励相同</td>
                                </tr>
                                <tr>
                                    <td>发起活动</td>
                                    <td>扣除与活动奖励相同的经验</td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                        <br/>
                        <div>
                            <h4 class="header-text">经验与等级的关系</h4>
                            <h5 class="after">
                                &nbsp&nbsp&nbsp&nbsp用户每获得30点经验值，提升1级。
                            </h5>
                        </div>
                        <br/>
                        <div>
                            <h4 class="header-text">等级与权限</h4>
                            <h5 class="after">
                                &nbsp&nbsp&nbsp&nbsp2级及以上的用户才有发起活动的权限。
                            </h5>
                        </div>
                    </div>
                </div>
            </div>



            <div class="smart-widget m-top-lg widget-dark-blue">
                <div class="smart-widget-header">
                    <span style="font-size: 18px">项目说明</span>
                </div>
                <div class="smart-widget-inner">

                    <div class="smart-widget-body">
                        <div>
                            <h4 class="header-text">项目介绍</h4>
                            <h5 class="after">
                                &nbsp&nbsp&nbsp&nbspInfinite Sport是一个运动社交网站，为用户提供运动与睡眠等数据上传、统计分析的服务以及用户与用户间组织参加活动等服务。
                                旨在帮助用户保持运动，在运动中结交好友，保持身心健康。
                            </h5>
                            <br/>

                            <h4 class="header-text">项目组成员</h4>
                            <h5 class="after">
                                白国风（组长）
                            </h5>
                            <h5 class="after">
                                安昕瑜
                            </h5>
                            <h5 class="after">
                                曹江湖
                            </h5>
                            <h5 class="after">
                                蔡新宇
                            </h5>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- ./padding-md -->

    </div><!-- /main-container -->
<?php include "middle.html";?>
    /*此处写js代码*/

<?php include "end.html";?>