<?php


require_once('./db_config.php');
$db= new db_operation();
if(isset($_COOKIE['name']) && isset($_COOKIE['password'])){
    unset($_COOKIE['name']);
    unset($_COOKIE['password']);

    setcookie('name', "", time()-60*10);
    setcookie('password', "",time()-60*10);
    header('location: login.php');
    return true;
}
else{
    header('location: login.php');
    return false;
}
session_destroy();
?>