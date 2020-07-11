<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clever - Education &amp; Courses Template | Courses</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">

</head>

<body>
    
    <?php 
        include 'check-header.php';
    ?>

    <?php
        $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
        $query = "SELECT User_id from user_info where UserName='".$_SESSION["username"]."'";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result)){
            $id_user=$row[0];
        }
        $query1="SELECT * from course_ofuser where id_user=".$id_user;
        $result1 = mysqli_query($conn,$query1);
    ?>
    <div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION["username"] ?></a></li>
                <li class="breadcrumb-item"><a href="#">My Course</a></li>
            </ol>
        </nav>
    </div>
    <div class="course-contain">
        <div class="course-contain-1">
            <div class="course-catagories">
            </div>
            <div class="course-list" id="course-list">
                <?php 
                    while($row1 = mysqli_fetch_array($result1))
                    {
                        $id_course=$row1["id_course"];
                        $query2 = "SELECT `Id_course`, `Name_course`,`Id_categories`, `Description`, `Image` FROM `course` Where `Id_course`= ".$id_course;
                        $result2 = mysqli_query($conn,$query2);
                        $row2 = mysqli_fetch_array($result2);
                            
                            $id = $row2[0];
                            $tt = $row2[1];
                            
                            $des = $row2[3];
                            $img = $row2[4];
                            $url = $row2[0];
                ?>
                <div class="course-1">
                    <figure class="">
                        <a href=""><img src="uploads/<?php echo $img?>" alt="Image" class="image-course"></a>
                    </figure>
                    <div class="">
                        <h6 class="name-course"><?php echo $tt ?></h6>
                        <p class="description-course"><?php echo $des ?></p>
                        <button class="btn btn-success"><a href="course-details.php?id_course=<?php echo $id ?>">Courses Details</a></button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php 
include 'common/footer.php'
 ?>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
</body>

</html>