<?php
        require_once('./db_config.php');
        $db= new db_operation();
  
  
        if(isset($_COOKIE['name']) && isset($_COOKIE['password'])){
                $_SESSION['message']= "welcome $name";
                $_SESSION['msg_type']= "success";

                header("location: view.php");
            }else{
                // $_SESSION['message']= "You must login first";
                // $_SESSION['msg_type']= "dark";
            }
           
            
?>