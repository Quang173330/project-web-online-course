<?php
    session_start();
    define('TEMPLATE',true);
    include_once('./config/connect.php');
    if(isset($_SESSION["username"])){
        include_once('common/header-login.php');

    } else{
        include_once('header.php');
    }
?>