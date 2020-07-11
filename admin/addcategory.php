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
        include "common/header.php";
        $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý danh mục</a></li>
                <li class="active">Thêm danh mục</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm danh mục</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">                           
                            <form role="form" method="post">
                                <div class="form-group">
<table>
            <tr>
                <td><label>Name :</label></td>
                <td><input type="text" class="form-control" name="name" placeholder="Name Category"></td>
            </tr>

            <tr >
                <td colspan="2" align="right"><button name="submit">Create Category</button></td>
                <td colspan="2" align="right"><button name="reset">Reset</button></td>
            </tr>

</table>                    
                            </div>
                            </form>
                    </div>
                </div>
            </div><!-- /.col-->
    </div>	<!--/.main-->
    
    <?php
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $query = "INSERT INTO categories (Name_category) VALUES('$name')";
            $result = mysqli_query($conn,$query);
            if($result)
            {
                echo "<div class='alert alert-success' role='alert'>Successfull</div>";
            }
            else
            {
                echo "<div class='alert alert-danger' role='alert'>Something went wrong.Please try again later !</div>";
            }
        }
    ?>
		
</body>

</html>
