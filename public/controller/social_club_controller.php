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
        $query = "select id,name,profile,email,level,exp,location,job,avatar from user U,social_club S where S.ownerid='$id' and S.followingid=U.id";
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

    public function send($sender,$receiver,$content){
        $sql ="select count(*) as total from chat";
        $statement = $this->db->find($sql);
        $row = $statement->fetchArray(SQLITE3_ASSOC);
        $count = $row['total']+1;
        $stime = date("Y-m-d H:i:s");
        $sql = "insert into chat(id,sender,receiver,content,stime) values('$count','$sender','$receiver','$content','$stime')";
        $statement = $this->db->operate($sql);
        if($statement){
            $val=array("status"=>"ok");
        }else{
            $val=array("status"=>"false");
        }
        return json_encode($val);
    }

    public function getUnreadNumber($receiver){
        $sql ="select c.sender as sender,u.avatar as avatar,count(*) as num from chat c,user u where c.receiver='$receiver' and u.id=c.sender and c.readed='false' group by c.sender,u.avatar";
        $statement = $this->db->find($sql);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    public function getMessages($owner,$friend){
        $sql = "update chat set readed=true where receiver='$owner'";
        $statement = $this->db->operate($sql);
        $sql ="select sender,receiver,content,stime from chat where (receiver='$friend' or receiver='$owner') and (sender='$friend' or sender='$owner') order by id asc";
        $statement = $this->db->find($sql);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

}