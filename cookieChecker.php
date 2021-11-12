<?php
    if(!isset($_COOKIE['name']) || !isset($_COOKIE['password'])){
        

        header("location: login.php");
    }


?>