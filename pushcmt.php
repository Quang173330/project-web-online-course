<?php
        if(isset($_POST['submit']))
        {
            $conn=mysqli_connect("localhost","root","","project");
            if(!$conn)
                echo "Connection failed".mysqli_connect_error();
            else{}
            $cmt = $_POST['comment'];
            $queryb = "INSERT INTO votes (id_user,comment,id_course,vote) VALUES('$id_user1','$cmt','$id_course','4')";
                            $resultb = mysqli_query($conn,$queryb);
                            header("Location: course-details.php?id_course=".$id_course);
     
                        }
    ?>