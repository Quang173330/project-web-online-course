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
        $id_cate=1;
        if(isset($_GET['id_category'])){
            $id_cate=$_GET['id_category'];
            $queryc = "SELECT `Id_category`, `Name_category` FROM `categories` where Id_category=".$id_cate;
            $resultc = mysqli_query($conn,$queryc);
            $rowc=mysqli_fetch_array($resultc);
            $name_cate=$rowc[1];
        }
    ?>
    <div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="courses.php">Courses</a></li>
                <?php
                    if(isset($name_cate)){
                ?>
                <li class="breadcrumb-item"><a href="#"><?php echo $name_cate ?></a></li>
                    <?php }?>
            </ol>
        </nav>
    </div>
    <div class="course-contain">
        <div class="course-contain-1">
            <div class="course-catagories">
                <?php 
                    $query = "SELECT `Id_category`, `Name_category` FROM `categories` ";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($result))
                        {
                            
                            $id_category = $row[0];
                            $name_category = $row[1];                   
                ?>
                <div class="catagories-name">
                    <h6 class="catagories-name"><a href="courses.php?id_category=<?php echo $id_category ?>"><?php echo $name_category ?></a></h6>
                </div>
                <?php } ?>
            </div>
            <div class="course-list" id="course-list">
                <?php 
                    $query = "SELECT `Id_course`, `Name_course`,`Id_categories`, `Description`, `Image` FROM `course` Where `Id_categories`= ".$id_cate;
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($result))
                        {
                            
                            $id = $row[0];
                            $tt = $row[1];
                            
                            $des = $row[3];
                            $img = $row[4];
                            $url = $row[0];
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