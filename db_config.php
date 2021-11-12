<?php

require_once("./operations.php");

class dbconfig{
    protected $connection;

    public function __construct(){
        $this-> db_connect();
    }


    protected function db_connect(){
        $this->connection =mysqli_connect('localhost','root','','crud_project');
        if(mysqli_connect_errno()){
            die($this->connection);
        }
        else{
           
        }
    }
}



?>