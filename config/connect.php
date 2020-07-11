<?php 
    if(!defined('TEMPLATE')){
        die('Bạn không có quyền truy cập vào trang web này');
    }
    $conn = mysqli_connect('localhost','root','','project');
    if($conn){
        mysqli_query($conn,"SET NAME 'utf8'");

    }else{
        die("Không thể kết nối tới database");
    }
?>