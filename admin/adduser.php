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
         ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý user</a></li>
                <li class="active">Thêm user</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm thành viên</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">                              
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="username" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>user</option>
                                    </select>
                                </div>
                                <button name="createuser" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                                
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div>	<!--/.main-->	
        <?php 
                if(!empty($_POST['username'])&&!empty($_POST['email']))
                {
                    if(isset($_POST['createuser']))
                    {
                    // $fname = $_POST['fname'];
                    // $lname = $_POST['lname'];
                    // $gender = $_POST['gender'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['pass'];
                    $repass = $_POST['re_pass'];
            
                    $query = "INSERT INTO user_info(Email_id,UserName,Password) VALUES('$email','$username','$password')";
            
                    if($repass == $password){
                        $result = mysqli_query($conn,$query);
                        if($result)
                        {
                            echo("<script>location.href = 'user.php';</script>");;
                        }
                        else
                        {
                            echo "<div class='alert alert-danger' role='alert'>Username or Email already registered</div>";
                        }
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>password != re-password</div>";
                }               
                }
        ?>
    </div>	
</body>

</html>