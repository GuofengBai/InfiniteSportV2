<?php

/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/12/1
 * Time: 23:00
 */
class database
{
    private static $instance;
    private $db;
    private function __construct(){
        $path = "../../web.db";
        $this->db = new SQLite3($path);
        if(!$this->db){
            echo $this->db->lastErrorMsg();
        }else {
            //echo "Opened database successfully\n";
        }
    }
    private function __clone(){}
    public static function getInstance(){
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function find($sql){
        $db = $this->db;
        $ret = $db->query($sql);
        return $ret;
    }
    public function operate($sql){
        $db = $this->db;
        $ret = $db->exec($sql);
        return $ret;
    }
}