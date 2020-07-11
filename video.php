<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Clever - Education &amp; Courses Template | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style1.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    
    <?php
        include 'check-header.php'
    ?>
    <?php
        $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
        $id_course = $_GET['id_course']; 
        $query1 = "SELECT `Id_course`, `Name_course`,`Id_categories`, `Description`, `Image` FROM `course` Where `Id_course`= ".$id_course;
        $result1 = mysqli_query($conn,$query1);
        while($row = mysqli_fetch_array($result1))
            {
                
                $id = $row[0];
                $tt = $row[1];
                
                $des = $row[3];
                $img = $row[4];
                $url = $row[0];
            }
            $query2 = "SELECT `Id_video`, `Title`,`Id_course`, `Src` FROM `video` Where `Id_course`= ".$id_course;
            $result2 = mysqli_query($conn,$query2);
            $result3 = mysqli_query($conn,$query2);  
            $row1 = mysqli_fetch_array($result2);
            $src=$row1[3];
            $title=$row1[1]
    ?>
    <div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="courses.php">Courses</a></li>
                <li class="breadcrumb-item"><a href="course-details.php?id_course=<?php echo $id_course ?>"><?php echo $tt ?></a></li>
            </ol>
        </nav>
    </div>
    <div class="video-contain">
        <div class="video-contain-1">
            <div class="video q&a">
                <video id="video" width="100%" height="450px"   controls >
                    <source src="videos/<?php echo $src ?>" id="sourcevideo" type="video/mp4">
                </video>
                <h3 id="title-video"><?php echo $title ?></h3>
                
            </div>
            <div class="list-video">
                <ul class="list-video-ul">
                    <?php
                        while($row = mysqli_fetch_array($result3)){
                            $id_video = $row[0];
                            $title = $row[1];
                            $src = $row[3];
                    ?>
                    <li onclick="changeVideo('<?php echo $src ?>','<?php echo $title ?>')"  class="name-video"><?php echo $title ?></li>
                    <?php } ?>                
                </ul>
            </div>
        </div>
    </div>
<?php
include 'footer.php'
 ?>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script>
        function changeVideo(sr,tt){
            document.getElementById("sourcevideo").src="videos/"+sr;
            console.log("videos/"+sr);
            document.getElementById("title-video").innerHTML=tt;
            document.getElementById("video").load();
            
        }
    </script>
</body>

</html>
