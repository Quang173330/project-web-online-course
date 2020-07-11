<?php
		$conn=mysqli_connect("localhost","root","","project");
		if(!$conn)
			echo "Connection failed".mysqli_connect_error();
		else{
				echo "Connection Done".mysqli_connect_error();
		}
		session_start();
		if(isset($_SESSION["username"]))
		{
			$username=$_SESSION["username"];
		}
		else{ echo 'session not started';}

$id = $_GET['id']; 
$query="DELETE FROM video WHERE Id_video='".$id."'";
$result = mysqli_query($conn,$query);
if($result)
								{
									echo "Video Deleted Successfully";
									//echo("<script>location.href = 'manageuser.php';</script>");
								}
								else
								{
									echo $result;
								}
mysqli_close($conn);
header("Location: video.php");

?> 