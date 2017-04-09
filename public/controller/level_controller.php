<?php

/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/4
 * Time: 13:59
 */
require_once "database.php";
class level_controller
{

    var $db;

    public function __construct()
    {
        $this->db = database::getInstance();
    }

    public function getLevel($id){

        $query = "select level from user where id='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if($row){
            return $row['level'];
        }else{
            return 0;
        }
    }

    function addExp($id,$axp){

        $query = "select exp from user where id='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if($row){
            $exp=$row['exp'];
            $exp=$axp+$exp;
            $level=floor($exp/30);
            $query = "update user set level='$level',exp='$exp' where id='$id'";
            $statement = $this->db->operate($query);
        }
    }

    function minusExp($id,$mxp){

        $query = "select exp from user where id='$id'";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        if($row){
            $exp=$row['exp'];
            $exp=$exp-$mxp;
            if($exp<0){
                $exp=0;
            }
            $level=floor($exp/30);
            $query = "update user set level='$level',exp='$exp' where id='$id'";
            $statement = $this->db->operate($query);
        }
    }
}