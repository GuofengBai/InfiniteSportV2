<?php
/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/4
 * Time: 16:00
 */
require_once "database.php";

function randomDate($begintime, $endtime)
{
    $begin = strtotime($begintime);
    $end = $endtime == "" ? mktime() : strtotime($endtime);
    $timestamp = rand($begin, $end);
    return date("Y-m-d", $timestamp);
}

function randomFloat($min = 0, $max = 1)
{
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

function insertUser()
{
    $db = database::getInstance();
    $names = array("蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵", "赵旭日", "冯潇霆", "杨智", "孙可", "武磊", "孙兴慜", "奇诚庸", "李青龙", "郑智", "郑大世", "嬴政", "李斯", "赵高", "蒙恬", "蒙毅", "成龙", "李小龙", "关晓彤", "李思思", "李冰冰", "范冰冰", "高岗", "林彪", "朱德", "彭德怀", "许世友", "胡宗南", "狄仁杰", "武则天", "赵构", "王思聪", "罗成", "秦琼", "单雄信", "李献计", "刘看山", "奥观海", "李青", "赵信", "柳白猿");
    for ($i = 0; $i < sizeof($names); $i++) {
        $id = "user" . $i;
        $name = $names[$i];
        $password = "123456";
        $level = rand(0, 10);
        $exp = $level * 30 + rand(0, 30);
        $profile = "大家好，我是亚洲足球明星的" . $i . "号" . $name;
        $email = "user" . $id . "and" . $name . "@gamil.com";
        $location = "江苏省南京市鼓楼区汉口路" . $i . "号";
        $yushu = $i % 5;
        $job = "测试工程师";
        if ($yushu == 3)
            $job = "外滩银行家";
        elseif ($yushu == 1)
            $job = "宗教裁判官";
        elseif ($yushu == 2)
            $job = "摩托赛车手";
        elseif ($yushu == 4)
            $job = "人社局公务员";
        $avatar = "images/default_avatar.jpg";
        echo $i . "   " . $id . "   " . $name . "   " . $profile . "   " . $location . "   " . $job;
        $query = "insert into user(id,name,password,level,exp,profile,email,location,job,avatar) values('$id','$name','$password','$level','$exp','$profile','$email','$location','$job','$avatar')";
        $db->operate($query);
    }
}

function insertSports()
{
    $db = database::getInstance();
    for ($i = 0; $i < 50; $i++) {
        $footstep = rand(1800, 3000);
        $k = 0;
        for ($j = strtotime('2017-03-11'); $j < strtotime('2017-04-11'); $j += 86400) {
            $y = mktime(0, 0, 0, 03, 11, 2017);
            $t = date("Y-m-d", $y + $k * 24 * 3600);
            $miles = rand(2, 10);
            $calorie = ceil($miles * randomFloat(50, 70));
            $steps = $miles * $footstep+rand(20,120);
            $id = "user" . $i;
            $sql = "INSERT INTO sport_record(ownerid,publish_date,steps,miles,calorie) VALUES ('$id','$t','$steps','$miles','$calorie');";
            $db->operate($sql);
            $k++;
        }
    }
}
function insertSportsaxy()
{
    $db = database::getInstance();

        $footstep = 2500;
        $k = 0;
        for ($j = strtotime('2017-02-11'); $j < strtotime('2017-04-12'); $j += 86400) {
            $y = mktime(0, 0, 0, 03, 11, 2017);
            $t = date("Y-m-d", $y + $k * 24 * 3600);
            $miles = rand(8, 9);
            $calorie = ceil($miles * randomFloat(55, 65));
            $steps = $miles * $footstep+rand(20,120);
            $id = "axy14";
            $sql = "INSERT INTO sport_record(ownerid,publish_date,steps,miles,calorie) VALUES ('$id','$t','$steps','$miles','$calorie');";
            $db->operate($sql);
            $k++;
        }

}

function insertWeight()
{
    $db = database::getInstance();
    for ($i = 0; $i < 50; $i++) {
        $k = 0;
        $wei = rand(45, 75);
        for ($j = strtotime('2017-03-11'); $j < strtotime('2017-04-11'); $j += 86400*rand(7,14)) {
            $y = mktime(0, 0, 0, 03, 11, 2017);
            $t = date("Y-m-d", $y + $k * 24 * 3600);
            $weight = $wei + rand(0, 4);
            $id = "user" . $i;
            $sql = "INSERT INTO weight_record(ownerid,publish_date,weight) VALUES ('$id','$t','$weight');";
            $db->operate($sql);
            $k++;
        }
    }
}
function insertWeightaxy()
{
    $db = database::getInstance();
    for ($i = 0; $i < 50; $i++) {
        $k = 0;
        $wei = 66;
        for ($j = strtotime('2017-02-11'); $j < strtotime('2017-04-12'); $j += 86400) {
            $y = mktime(0, 0, 0, 03, 11, 2017);
            $t = date("Y-m-d", $y + $k * 24 * 3600);
            $weight = $wei + rand(0, 4);
            $id = "user" . $i;
            $sql = "INSERT INTO weight_record(ownerid,publish_date,weight) VALUES ('$id','$t','$weight');";
            $db->operate($sql);
            $k++;
        }
    }
}

function insertSleep()
{
    $db = database::getInstance();
    for ($i = 0; $i < 50; $i++) {
        $k = 0;
        $stand=rand(300,540);
        for ($j = strtotime('2017-03-11'); $j < strtotime('2017-04-11'); $j += 86400) {
            $y = mktime(0, 0, 0, 03, 11, 2017);
            $t = date("Y-m-d", $y + $k * 24 * 3600);
            $full_sleep = $stand+rand(30,60)-rand(30,60);
            $deep_sleep = $full_sleep - rand(100, 150);
            $id = "user" . $i;
            $sql = "INSERT INTO sleep_record(ownerid,publish_date,full_sleep,deep_sleep) VALUES ('$id','$t','$full_sleep','$deep_sleep');";
            $db->operate($sql);
            $k++;
        }
    }
}
function insertGoal(){
    $db = database::getInstance();
    for ($i = 0; $i < 50; $i++) {
        $goal=rand(4,12)*5;
        $id = "user" . $i;
        $sql="INSERT INTO weekly_goal(ownerid,goal) VALUES('$id','$goal');";
        $db->operate($sql);
    }
}

