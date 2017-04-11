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

function insertUser()
{
    $db=database::getInstance();
    $names=array("蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵","蔡慧康", "王大雷", "曾诚", "于海", "于大宝", "孙世林", "秦升", "邓卓祥", "邵佳一", "蒿俊闵");
    for ($i = 0; $i < 100; $i++) {
        $id = "user".$i;
        $name = $names[$i];
        $password = "123456";
        $level = rand(0, 10);
        $exp = $level*30+rand(0, 30);
        $profile="大家好，我是沙瑞金书记的".$i."号保镖";
        $email="user".$i."@gamil.com";
        $location="江苏省南京市鼓楼区汉口路".$i."号";
        $yushu=$i%5;
        $job="测试工程师";
        if($yushu==3)
            $job="外滩银行家";
        elseif($yushu==1)
            $job="宗教裁判官";
        elseif ($yushu==2)
            $job="摩托赛车手";
        elseif ($yushu==4)
            $job="人社局公务员";
        $avatar="images/default_avatar.jpg";
        echo $i."   ".$id."   ".$name."   ".$profile."   ".$location."   ".$job;
        $query = "insert into user(id,name,password,level,exp,profile,email,location,job,avatar) values('$id','$name','$password','$level','$exp','$profile','$email','$location','$job','$avatar')";
        $db->operate($query);
    }
}

function insertSports()
{
    $db=database::getInstance();
    for ($i = 0; $i < 100; $i++) {
        $k=0;
        for ($j = strtotime('2017-03-11'); $j < strtotime('2017-04-11'); $j+=86400) {
            $y = mktime(0,0,0,03,11,2017);
            $t=date("Y-m-d", $y+$k*24*3600);
            $miles = rand(2, 10);
            $calorie = rand(120, 600);
            $steps = rand(5000, 25000);
            $id = "user".$i;
            $sql = "INSERT INTO sport_record(ownerid,publish_date,steps,miles,calorie) VALUES ('$id','$t','$steps','$miles','$calorie');";
            $statement = $db->operate($sql);
            $k++;
        }
    }
}

function insertWeight()
{
    $db=database::getInstance();
    for ($i = 0; $i < 100; $i++) {
        $k=0;
        $wei=rand(45,75);
        for ($j = strtotime('2017-03-11'); $j < strtotime('2017-04-11'); $j+=86400) {
            $y = mktime(0,0,0,03,11,2017);
            $t=date("Y-m-d", $y+$k*24*3600);
            $weight = $wei+rand(0,4);
            $id = "user".$i;
            $sql = "INSERT INTO weight_record(ownerid,publish_date,weight) VALUES ('$id','$t','$weight');";
            $db->operate($sql);
        }
    }
}

function insertSleep(){
    $db=database::getInstance();
    for ($i = 0; $i < 100; $i++) {
        $k=0;
        for ($j = strtotime('2017-03-11'); $j < strtotime('2017-04-11'); $j+=86400) {
            $y = mktime(0,0,0,03,11,2017);
            $t=date("Y-m-d", $y+$k*24*3600);
            $full_sleep = 300+rand(0, 240);
            $deep_sleep = $full_sleep-rand(100,150);
            $id = "user".$i;
            $sql = "INSERT INTO sleep_record(ownerid,publish_date,full_sleep,deep_sleep) VALUES ('$id','$t','$full_sleep','$deep_sleep');";
            $db->operate($sql);
        }
    }
}

insertSleep();