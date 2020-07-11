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
        if(isset($_SESSION["username"]))
        {
            $username=$_SESSION["username"];
        }
        else{ echo 'session not started';}
    ?>

		<!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
			<a href="addcategory.php" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i> Thêm danh mục
			</a>
		</div>
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
								data-toolbar="#toolbar"
									data-toggle="table">
		
									<tr>
						<th>Id</th>
						<th>Name</th>					
						<th>Delete</th>
						<th>Change</th>
						
					</tr>
					<?php
						$query = "SELECT `Id_category`, `Name_category` FROM `categories`";
						$result = mysqli_query($conn,$query);
						while($row = mysqli_fetch_array($result))
						{
							
							$id_category = $row[0];
							$name = $row[1];

							echo '<tr>';
							echo '<td>'.$id_category.'</td>';
							echo '<td>'.$name.'</td>';
							echo "<td><a class='btn' href=\"deletecg.php?id=".$row[0]."\">Delete</a></td>";
							echo "<td><a class='btn' href=\"changecategory.php?id=".$row[0]."\">Change</a></td>";
							echo '</tr>';
						}
					?>
								</table>
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
