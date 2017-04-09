<?php

/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/3
 * Time: 12:58
 */
require_once "database.php";
require_once "level_controller.php";
class social_club_controller
{
    var $db;

    public function __construct()
    {
        $this->db = database::getInstance();
    }

    function getFollowing($id){
        $query = "select id,name,profile,email,level,exp from user U,social_club S where S.ownerid='$id' and S.followingid=U.id";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function setFollowing($id,$followingid){
        $lb=new level_controller();
        $level=$lb->getLevel($id);
        if($level<1){
            $val=array("status"=>"false","detail"=>"等级不够");
            return json_encode($val);
        }
        $lb->minusExp($id,3);
        $query = "insert into social_club(ownerid,followingid) values('$id','$followingid')";
        $statement = $this->db->operate($query);
        if($statement){
            $val=array("status"=>"ok");
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);
    }

    function unsetFollowing($id,$followingid){
        $query = "delete from social_club where ownerid='$id' and followingid='$followingid'";
        $statement = $this->db->operate($query);
        if($statement){
            $val=array("status"=>"ok");
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);
    }

    function getWeeklyRank($id){
        $monday=date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600));
        $query = "select S.ownerid as id,sum(steps) as w_steps,sum(miles) as w_miles,sum(calorie) as w_calorie from social_club F,sport_record S where F.ownerid='$id' and S.ownerid=F.followingid and publish_date>='$monday' group by S.ownerid";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }


}