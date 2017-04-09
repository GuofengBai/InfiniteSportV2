<?php
/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/2
 * Time: 18:34
 */
require_once "database.php";
require_once "level_controller.php";
class activity_controller
{
    var $db;

    public function __construct()
    {
        $this->db = database::getInstance();
    }

    function getAllActivity(){
        $query = "select * from activity";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function getActivity($id){
        $query = "select A.id,A.name as aname,A.creator,U.name,A.start_date,A.end_date,A.description,A.bonus from activity A,user U where A.id='$id' and A.creator=U.id";
        $statement = $this->db->find($query);
        $row=$statement->fetchArray(SQLITE3_ASSOC);
        return json_encode($row);
    }

    function createActivity($uid,$aname,$start_date,$end_date,$description,$bonus){

        $lb=new level_controller();
        $level=$lb->getLevel($uid);
        if($level<3){
            $val=array("status"=>"false","detail"=>"等级不够");
            return json_encode($val);
        }
        $query = "insert into activity(name,creator,start_date,end_date,description,bonus) values('$aname','$uid','$start_date','$end_date','$description','bonus')";
        $statement = $this->db->operate($query);
        if(!$statement){
            $val=array("status"=>"false");
            return json_encode($val);
        }else{
            $query="select max(id) as nid from activity";
            $statement = $this->db->find($query);
            $row=$statement->fetchArray(SQLITE3_ASSOC);
            $nid=$row['nid'];
            $query="insert into user_activity(uid,aid,create_join) values('$uid','$nid',1)";
            $statement = $this->db->operate($query);
            if(!$statement){
                $val=array("status"=>"false");
                return json_encode($val);
            }else{
                $lb->minusExp($uid,$bonus);
                $val=array("status"=>"ok");
                return json_encode($val);
            }
        }
    }

    function destroyActivity($id){
        $query="delete from user_activity where aid='$id'";
        $statement = $this->db->operate($query);
        if(!$statement){
            $val=array("status"=>"false");
            return json_encode($val);
        }else{
            $query="delete from activity where id='$id'";
            $statement = $this->db->operate($query);
            if(!$statement){
                $val=array("status"=>"false");
                return json_encode($val);
            }else{
                $val=array("status"=>"ok");
                return json_encode($val);
            }
        }
    }

    function joinActivity($uid,$aid){

        $lb=new level_controller();
        $level=$lb->getLevel($uid);
        if($level<2){
            $val=array("status"=>"false","detail"=>"等级不够");
            return json_encode($val);
        }

        $query="insert into user_activity(uid,aid,create_join) values('$uid','$aid',0)";
        $statement = $this->db->operate($query);
        if(!$statement){
            $val=array("status"=>"false");
            return json_encode($val);
        }else{
            $query="select bonus from activity where aid='$aid'";
            $statement = $this->db->find($query);
            $row=$statement->fetchArray(SQLITE3_ASSOC);
            $axp=$row['bonus'];
            $lb->addExp($uid,$axp);
            $val=array("status"=>"ok");
            return json_encode($val);
        }

    }

    function quitActivity($uid,$aid){
        $query="delete from user_activity where uid='$uid' and aid='$aid'";
        $statement = $this->db->operate($query);
        if(!$statement){
            $val=array("status"=>"false");
            return json_encode($val);
        }else{
            $val=array("status"=>"ok");
            return json_encode($val);
        }
    }

    function getUserActivity($id){
        $query = "select id,name,creator,start_date,end_date,description,bonus,sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie ".
            "from (select A.* from activity A,user_activity U where U.uid='$id' and U.aid=A.id) R left join ".
            "(select publish_date,steps,miles,calorie from sport_record where ownerid='$id') S ".
            "on R.start_date<=S.publish_date and R.end_date>=S.publish_date group by id,creator,start_date,end_date,description";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function getJoinedActivity($id){
        $query = "select id,name,creator,start_date,end_date,description,bonus,sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie ".
            "from (select A.* from activity A,user_activity U where U.uid='$id' and U.aid=A.id and U.create_join=0) R left join ".
            "(select publish_date,steps,miles,calorie from sport_record where ownerid='$id') S ".
            "on R.start_date<=S.publish_date and R.end_date>=S.publish_date group by id,creator,start_date,end_date,description";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function getCreatedActivity($id){
        $query = "select id,name,creator,start_date,end_date,description,bonus,sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie ".
            "from (select A.* from activity A,user_activity U where U.uid='$id' and U.aid=A.id and U.create_join=1) R left join ".
            "(select publish_date,steps,miles,calorie from sport_record where ownerid='$id') S ".
            "on R.start_date<=S.publish_date and R.end_date>=S.publish_date group by id,creator,start_date,end_date,description";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function getActivityJoiner($aid){
        $query = "select id,sum(steps) as t_steps,sum(miles) as t_miles,sum(calorie) as t_calorie ".
            "from (select U.uid as id,A.start_date,A.end_date from activity A,user_activity U where A.id='$aid' and U.aid=A.id) R left join ".
            "sport_record S ".
            "on id=S.ownerid and R.start_date<=S.publish_date and R.end_date>=S.publish_date group by id order by t_steps desc";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

    function getUncompleteActivity($id){
        $today=date("Y-m-d");
        $query = "select id,start_date,end_date,description,bonus from activity A,user_activity U where U.uid='$id' and U.aid=A.id and A.end_date>='$today'";
        $statement = $this->db->find($query);
        $result = array();
        while($row=$statement->fetchArray(SQLITE3_ASSOC)){
            array_push($result,$row);
        }
        return json_encode($result);
    }

}