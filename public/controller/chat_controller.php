



<?php

/**
 * Created by IntelliJ IDEA.
 * User: baiguofeng
 * Date: 2017/4/9
 * Time: 19:07
 */
require_once "database.php";
class chat_controller{

    var $db;

    public function __construct(){
        $this->db = database::getInstance();
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
        $sql ="select sender,count(*) as num from chat where receiver='$receiver' and readed='false' group by sender";
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