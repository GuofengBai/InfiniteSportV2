<?php

/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/1
 * Time: 22:18
 */
require_once "database.php";
class user_controller
{
    var $db;

    public function __construct()
    {
        $this->db = database::getInstance();
    }

    function login($id,$password){
        session_start();
        $query = "select * from user where id='$id' and password='$password'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if($row){
            $val=array("status"=>"ok");
            $_SESSION['id'] = $id;
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);

    }

    function logout(){
        session_start();
        if(isset($_SESSION['id'])){
            unset($_SESSION['id']);
        }
        $val=array("status"=>"ok");
        return json_encode($val);
    }

    function getAllUser(){
        $query = "select id,name,profile,email,level,exp from user";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);

    }

    function getUser($id){
        $query = "select id,name,profile,email,level,exp,sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie,count(*) as t_days from user left join sport_record on ownerid=id where id='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        return json_encode($row);
    }

    function searchUser($search){
        $query = "select id,name,profile,email,level,exp,sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie,count(*) as t_days from user left join sport_record on ownerid=id where id like '%{$search}%' or name like '%{$search}%' group by id";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function addUser($id,$name,$password){
        $query = "insert into user(id,name,password,level,exp) values('$id','$name','$password',0,0)";
        $statement = $this->db->operate($query);
        if($statement){
            $val=array("status"=>"ok");
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);
    }

    function updateUser($id,$email,$profile){
        $query = "update user set email='$email',profile='$profile' where id='$id'";
        $statement = $this->db->operate($query);
        if($statement){
            $val=array("status"=>"ok");
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);
    }

    function updatePassword($id,$ops,$nps){
        $query = "select * from user where id='$id' and password='$ops'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if($row){
            $query = "update user set password='$nps' where id='$id'";
            $statement = $this->db->operate($query);
            if($statement){
                $val=array("status"=>"ok");
            }else{
                $val=array("status"=>"false");
            }
            return json_encode($val);
        }else{
            $val=array("status"=>"false");
            return json_encode($val);
        }
    }

}