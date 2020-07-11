<?php 
session_start();
define('TEMPLATE',true);
include_once('./config/connect.php');
if(isset($_SESSION["username"])){
    $conn=mysqli_connect("localhost","root","","project");
    if(!$conn)
        echo "Connection failed".mysqli_connect_error();
    else{}
    
    $query = "SELECT User_id from user_info where UserName='".$_SESSION["username"]."'";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
        $id_user=$row[0];
    }
    $id_course = $_GET['id_course'];
    $query1 = "INSERT INTO course_ofuser(id_course,id_user) VALUES('$id_course','$id_user')";
    $result1 = mysqli_query($conn,$query1);
    if($result1){
        header("Location:video.php?id_course=".$id_course);
    }else{
        die("error");
    }
} else{
    header("Location:su/login.php");
}
?>
?>