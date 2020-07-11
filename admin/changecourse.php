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
include 'common/header.php';
?>
<?php         $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
        $query1 = "SELECT * FROM categories";
        $result1 = mysqli_query($conn,$query1);
        $id = $_GET['id'];
        $query = "SELECT *  FROM course WHERE Id_course='$id'";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result))
        {
            $id_category=$row["Id_Categories"];
            $name = $row["Name_course"];
            $des=$row["Description"];
            $img = $row["Image"];
        }
         ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý course</a></li>
                <li class="active">Sửa thông tin course</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin course</h1>
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
                                                    while($row = mysqli_fetch_array($result1))
                                                    {   
                                                        if($row[0]==$id_category){
                                                        echo '<option selected>'.$row[1].'</option>';
                                                        } else {
                                                            echo '<option >'.$row[1].'</option>';                                                           
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Name :</label></td>
                                        <td><input type="text" class="form-control" name="name" value="<?php echo $name?>" placeholder="Name Course"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Description :</label></td>
                                        <td><textarea rows="10" cols="50" class="form-control" 
                                            placeholder="Infromation" id="message" name="description" required
                                            data-validation-required-message="Please enter your message" minlength="5" 
                                            data-validation-minlength-message="Min 5 characters" style="resize:none;margin-top:10px"><?php echo $des?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="center"><button class="btn btn-block" name="submit">Change Course</button></td>
                                    </tr>
            
                                    <tr>
                                        <td colspan="2" align="center"><button class="btn btn-block">Reset</button></td>
                                    </tr>
                                
                                </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div>	<!--/.main-->	
        <?php 
                if(!empty($_POST['name'])&&!empty($_POST['description']))
                {
                    if(isset($_POST['submit']))
                    {
                    // $fname = $_POST['fname'];
                    // $lname = $_POST['lname'];
                    // $gender = $_POST['gender'];
                    $name = $_POST['name'];
                    $des = $_POST['description'];
                    $category = $_POST['category'];
                    $query3 = "SELECT `Id_category` FROM `categories` Where `Name_category` ="."'".$category."'";

                    $result3 = mysqli_query($conn,$query3);
                    if($result3){
                        while($row = mysqli_fetch_array($result3))
                    {
                        $id_category=$row[0];
                    }
                    } else{
                        echo "lỗi";
                    }
                    $query2 = "UPDATE course SET Name_course='$name',Description='$des',Id_categories='$id_category' WHERE Id_course='$id'";
            
                        $result2 = mysqli_query($conn,$query2);
                        if($result1)
                        {
                            echo("<script>location.href = 'course.php';</script>");;
                        }
                        else
                        {
                            echo "<div class='alert alert-danger' role='alert'>Course coudnt be updated</div>";
                        }
                    }
                }              
                
        ?>
    </div>	
</body>

</html>