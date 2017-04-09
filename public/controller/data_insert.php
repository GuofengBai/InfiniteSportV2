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
    for ($i = 100; $i < 200; $i++) {
        $id = "user".$i;
        $name = "user".$i;
        $password = "123456";
        $level = rand(0, 10);
        $exp = $level*30+rand(0, 30);
        echo $i."   ".$id."   ".$name;
        $query = "insert into user(id,name,password,level,exp) values('$id','$name','$password','$level','$exp')";
        $db->operate($query);
    }
}

function insertSports()
{
    $db=database::getInstance();
    for ($i = 0; $i < 200; $i++) {
        for ($j = 0; $j < 100; $j++) {
            $date = randomDate("2015-01-01", "2015-12-31");
            $miles = rand(0, 10);
            $calorie = rand(500, 5000);
            $steps = rand(10, 30000);
            $id = "user".$i;
            $sql = "INSERT INTO sport_record(ownerid,publish_date,steps,miles,calorie) VALUES ('$id','$date','$steps','$miles','$calorie');";
            $statement = $db->operate($sql);
        }
    }
}

function insertWeight()
{
    $db=database::getInstance();
    for ($i = 0; $i < 200; $i++) {
        for ($j = 0; $j < 50; $j++) {
            $date = randomDate("2016-01-01", "2016-12-04");
            $weight = 60+rand(0, 20);
            $id = "user".$i;
            $sql = "INSERT INTO weight_record(ownerid,publish_date,weight) VALUES ('$id','$date','$weight');";
            $db->operate($sql);
        }
    }
}

function insertSleep(){
    $db=database::getInstance();
    for ($i = 0; $i < 200; $i++) {
        for ($j = 0; $j < 50; $j++) {
            $date = randomDate("2016-01-01", "2016-12-04");
            $full_sleep = 200+rand(0, 200);
            $deep_sleep = $full_sleep-rand(100,200);
            $id = "user".$i;
            $sql = "INSERT INTO sleep_record(ownerid,publish_date,full_sleep,deep_sleep) VALUES ('$id','$date','$full_sleep','$deep_sleep');";
            $db->operate($sql);
        }
    }
}

insertSleep();