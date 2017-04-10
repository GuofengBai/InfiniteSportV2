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

    <div class="main-container">

	</div><!-- /main-container -->
    <?php include "middle.html";?>
    /*此处写js代码*/

    <?php include "end.html";?>