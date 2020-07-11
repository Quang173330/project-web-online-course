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
        $id = $_GET['id'];
        $query = "SELECT Name_category FROM categories WHERE Id_category='$id'";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result))
        {
            $name = $row["Name_category"];
        }
         ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý category</a></li>
                <li class="active">Sửa thông tin category</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin category</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">                              
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Name Category</label>
                                    <input name="name" required class="form-control" value="<?php echo $name;?>" placeholder="">
                                </div>
                                <button name="changecategory" type="submit" class="btn btn-success">Sửa</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                                
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div>	<!--/.main-->	
        <?php 
                if(!empty($_POST['name']))
                {
                    if(isset($_POST['changecategory']))
                    {
                    $name = $_POST['name'];
            
                    $query1 = "UPDATE categories SET Name_category='$name' WHERE Id_category='$id'";
            
                    if($repass == $password){
                        $result1 = mysqli_query($conn,$query1);
                        if($result1)
                        {
                            echo("<script>location.href = 'category.php';</script>");;
                        }
                        else
                        {
                            echo "<div class='alert alert-danger' role='alert'>Category coudnt be updated</div>";
                        }
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error</div>";
                }               
                }
        ?>
    </div>	
</body>

</html>