<?php
    session_start();
    define('TEMPLATE',true);
    include_once('../config/connect.php');
    if(isset($_SESSION['admin'])){
        include_once('admin.php');

    } else{
        include_once('login.php');
    }
?>