<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 27/12/14
 * Time: 9:02 AM
 */

class class_sql {
    private $HOST;
    private $USER;
    private $PASSWORD;
    private $DATABASE;

    public $CONN;

    public function class_sql(){
        $this->HOST = '192.168.2.7';
        $this->USER = 'root';
        $this->PASSWORD = 'Pilot07son';
        $this->DATABASE = 'User';
    }

    public function connect (){
        $this->CONN = new mysqli($this->HOST, $this->USER, $this->PASSWORD,$this->DATABASE);

        if($this->CONN->connect_errno){
            return false;
        } else {
            return true;
        }
    }


}