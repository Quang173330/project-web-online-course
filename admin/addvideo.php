<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>COURSERA - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

</head>

<body>
    <?php
        include 'common/header.php'
    ?>
    <?php
        
        $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
    ?>

    <?php
        $query = "SELECT Name_course FROM course";
        $result = mysqli_query($conn,$query);
    ?>

		<!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý Video</a></li>
                <li class="active">Thêm Video</li>
            </ol>
        </div><!--/.row-->


        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Video</h1>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $course = $_POST['course'];
                        $title = $_POST['title'];
                        
                        $query1 = "SELECT `Id_course` FROM `course` Where `Name_course` ="."'".$course."'";

                        $result1 = mysqli_query($conn,$query1);
                        if($result1){
                            while($row = mysqli_fetch_array($result1))
                        {
                            $id_course=$row[0];
                        }
                        } else{
                            echo "lỗi";
                        }
                        $src=$id_course.$_FILES["fileToUpload"]["name"];
                        $query2 = "INSERT INTO video (Title,Id_Course,Src) VALUES('$title','$id_course','$src')";
                        $result2 = mysqli_query($conn,$query2);
                        if($result2)
                        {
                            echo "<div class='alert alert-success' role='alert'>Chapter added successfully</div>";
                        }
                        else
                        {   
                            echo "<div class='alert alert-danger' role='alert'>Something went wrong.Please try again later !</div>";
                        }
                    }
                ?>
            </div>

        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <tr>
                                        <td><label>Select Course :</label></td>
                                        <td>
                                            <select name="course" class="form-control">
                                                <?php
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        echo '<option selected>'.$row[0].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label><Title></Title> :</label></td>
                                        <td><input type="text" class="form-control" name="title" placeholder="Title Video"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Update Video</label></td>
                                        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                                        <td><br></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="center"><button class="btn btn-block" name="submit">Create Video</button></td>
                                    </tr>
            
                                    <tr>
                                        <td colspan="2" align="center"><button class="btn btn-block">Reset</button></td>
                                    </tr>
                                
                                </form>
                            </div>
                        </div>
                    </div><!-- /.col-->
                </div><!-- /.row -->
        </div>
        <?php
            if(isset($_POST["submit"])) {
            $target_dir = "../videos/".$id_course;
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            


            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }





            if($imageFileType != "mp4"  ) {
                echo "Sorry, only mp4 files are allowed.";
                $uploadOk = 0;
            }


            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";

            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>

</body>

</html>
