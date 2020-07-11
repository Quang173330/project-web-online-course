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
        $query = "SELECT Name_category FROM categories";
        $result = mysqli_query($conn,$query);
    ?>

		<!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý Course</a></li>
                <li class="active">Thêm Course</li>
            </ol>
        </div><!--/.row-->


        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Course</h1>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $category = $_POST['category'];
                        $name = $_POST['name'];
                        $des = $_POST['description'];
                        $img=$name.$_FILES["fileToUpload"]["name"];
                        $query1 = "SELECT `Id_category` FROM `categories` Where `Name_category` ="."'".$category."'";

                        $result1 = mysqli_query($conn,$query1);
                        if($result1){
                            while($row = mysqli_fetch_array($result1))
                        {
                            $id_category=$row[0];
                        }
                        } else{
                            echo "lỗi";
                        }
                        $query2 = "INSERT INTO course (Name_course,Id_Categories,Description,Image) VALUES('$name','$id_category','$des','$img')";
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
                                        <td><label>Select Category :</label></td>
                                        <td>
                                            <select name="category" class="form-control">
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
                                        <td><label>Name :</label></td>
                                        <td><input type="text" class="form-control" name="name" placeholder="Name Course"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Description :</label></td>
                                        <td><textarea rows="10" cols="50" class="form-control" 
                                            placeholder="Infromation" id="message" name="description" required
                                            data-validation-required-message="Please enter your message" minlength="5" 
                                            data-validation-minlength-message="Min 5 characters" style="resize:none;margin-top:10px"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Update Img</label></td>
                                        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                                        <td><br></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="center"><button class="btn btn-block" name="submit">Create Course</button></td>
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
            $target_dir = "../uploads/".$name;
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            


            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }


            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }


            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
