
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
        session_start();
        if(isset($_SESSION["admin"]))
        {
            $username=$_SESSION["admin"];
        }
        else{ echo 'session not started';}
    ?>

     <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Danh sách user</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách user</h1>
            </div>
        </div><!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="adduser.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm user
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">                           
                    <tr>
                        <th>User ID</th>
                        <th>Email ID</th>
                        <th>User Name</th>
                        <th>Delete</th>
                        <th>Change</th>
                        
                    <?php
                        $query = "SELECT User_id,Email_id,UserName FROM user_info";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            $id = $row[0];
                            $email = $row[1];
                            $userName = $row[2];
                            echo '<tr>';
                            echo '<td>'.$id.'</td>';
                            echo '<td>'.$email.'</td>';
                            echo '<td>'.$userName.'</td>';
                    
                            echo "<td><a class='btn' href=\"delete.php?id=".$row[0]."\">Delete</a></td>";
                            echo "<td><a class='btn' href=\"changeuser.php?id=".$row[0]."\">Change</a></td>";
                            echo '</tr>';
                        }
                    ?>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div><!--/.row-->	
    </div>	<!--/.main-->
		
</body>

</html>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
