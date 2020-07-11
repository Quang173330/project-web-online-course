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
        $query = "SELECT * FROM course";
        $result = mysqli_query($conn,$query);
        $id = $_GET['id'];
        $query1 = "SELECT *  FROM video WHERE Id_video='$id'";
        $result1 = mysqli_query($conn,$query1);
        while($row = mysqli_fetch_array($result1))
        {
            $id_course=$row["Id_Course"];
            $title = $row["Title"];
        }
         ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý video</a></li>
                <li class="active">Sửa thông tin video</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin video</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">                              
                        <form role="form" method="post" enctype="multipart/form-data">
                                    <tr>
                                        <td><label>Select video :</label></td>
                                        <td>
                                            <select name="course" class="form-control">
                                                <?php
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        if($row[0]==$id_course){
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
                                        <td><label>Title :</label></td>
                                        <td><input type="text" class="form-control" name="title" value="<?php echo $title?>" placeholder="Name Course"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="center"><button class="btn btn-block" name="submit">Change Video</button></td>
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
                if(!empty($_POST['title'])&&!empty($_POST['course']))
                {
                    if(isset($_POST['submit']))
                    {
                    $title = $_POST['title'];
                    $course = $_POST['course'];
                    $query2 = "SELECT `Id_course` FROM `course` Where `Name_course` ="."'".$course."'";

                    $result2 = mysqli_query($conn,$query2);
                    if($result2){
                        while($row = mysqli_fetch_array($result2))
                    {
                        $id_course=$row[0];
                    }
                    } else{
                        echo "lỗi";
                    }
                    $query3 = "UPDATE video SET Title='$title',Id_Course='$id_course' WHERE Id_video='$id'";
            
                        $result3 = mysqli_query($conn,$query3);
                        if($result3)
                        {
                            echo("<script>location.href = 'video.php';</script>");;
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