<?php

/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/2
 * Time: 22:35
 */
require_once "database.php";
require_once "level_controller.php";
class sports_controller
{
    var $db;

    public function __construct()
    {
        $this->db = database::getInstance();
    }

    function getWeeklyGoal($id){
        $query = "select goal from weekly_goal where ownerid='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if(!$row){
            $query = "insert into weekly_goal(ownerid,goal) values('$id',0)";
            $statement = $this->db->operate($query);
            $row=array("goal"=>0);
        }
        return json_encode($row);
    }

    function setWeeklyGoal($id,$goal){
        $this->getWeeklyGoal($id);
        $query = "update weekly_goal set goal='$goal' where ownerid='$id'";
        $statement = $this->db->operate($query);
        if($statement){
            $val=array("status"=>"ok");
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);
    }

    function getTotalSportDays($id){
        $query = "select count(*) as t_days from sport_record where ownerid='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        return json_encode($row);
    }

    function getSportRecord($id){
        $query = "select publish_date,steps,miles,calorie from sport_record where ownerid='$id'";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function getTotalSportRecord($id){
        $query = "select sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie from sport_record where ownerid='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        return json_encode($row);
    }

    function getWeeklySportRecord($id){
        $monday=date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600));
        $query = "select sum(steps) as w_steps,sum(miles) as w_miles,sum(calorie) as w_calorie from sport_record where ownerid='$id' and publish_date>='$monday'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        return json_encode($row);
    }

    function updateSportRecord($id,$date,$steps,$miles,$calorie){

        $lb=new level_controller();

        $query = "select * from sport_record where ownerid='$id' and publish_date='$date'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if(!$row){
            $query = "insert into sport_record(ownerid,publish_date,steps,miles,calorie) values('$id','$date','$steps','$miles','$calorie')";
            $statement = $this->db->operate($query);
            if($statement){
                $lb->addExp($id,1);
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }else{
            $query = "update sport_record set steps=steps+'$steps',miles=miles+'$miles',calorie=calorie+'$calorie' where ownerid='$id' and publish_date='$date'";
            $statement = $this->db->operate($query);
            if($statement){
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }
    }

    function getWeightRecord($id){
        $query = "select publish_date,weight from weight_record where ownerid='$id'";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function updateWeightRecord($id,$date,$weight){
        $query = "select * from weight_record where ownerid='$id' and publish_date='$date'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if(!$row){
            $query = "insert into weight_record(ownerid,publish_date,weight) values('$id','$date','$weight')";
            $statement = $this->db->operate($query);
            if($statement){
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }else{
            $query = "update weight_record set weight='$weight' where ownerid='$id' and publish_date='$date'";
            $statement = $this->db->operate($query);
            if($statement){
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }
    }

    function getSleepRecord($id){
        $query = "select publish_date,full_sleep,deep_sleep from sleep_record where ownerid='$id'";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function updateSleepRecord($id,$date,$full_sleep,$deep_sleep){
        $query = "select * from sleep_record where ownerid='$id' and publish_date='$date'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if(!$row){
            $query = "insert into sleep_record(ownerid,publish_date,full_sleep,deep_sleep) values('$id','$date','$full_sleep','$deep_sleep')";
            $statement = $this->db->operate($query);
            if($statement){
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }else{
            $query = "update sleep_record set full_sleep=full_sleep+'$full_sleep',deep_sleep=deep_sleep+'$deep_sleep' where ownerid='$id' and publish_date='$date'";
            $statement = $this->db->operate($query);
            if($statement){
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }
    }
}