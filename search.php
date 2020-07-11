<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
        
        $q = $_GET['q'];
        
        $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
        $sql="SELECT * FROM course WHERE Name_course LIKE '%".$q."%'";
        
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_array($result)){
                $id = $row[0];
                $tt = $row[1];
                $des = $row[3];
                $img = $row[4];
                echo "<div class='course-1'>";
                echo "<figure class=''>";
                    echo "<a href=''><img src='uploads/".$img."'alt='Image' class='image-course'></a>";
                echo "</figure>";
                echo "<div class=''>";
                    echo "<h6 class='name-course'>".$tt."</h6>";
                    echo "<p class='description-course'>".$des."</p>";
                    echo "<button class='btn btn-success'><a href='course-details.php?id_course=".$id."'>Courses Details</a></button>";
                echo "</div>";
                echo "</div>";
            }
        } else{
            echo "<h3>error</h3>";
        }
    ?>
</body>
</html>