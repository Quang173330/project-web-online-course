<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Profile Manager</h2>

                        <?php
        $query = "SELECT Email_id,UserName,Password FROM user_info WHERE UserName='$username'";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result))
        {
            $email = $row["Email_id"];
            $password = $row["Password"];
        }
    ?>

<?php
    if(!empty($_POST['username'])&&!empty($_POST['email']))
    {
        if(isset($_POST['signup']))
        {
        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $gender = $_POST['gender'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $repass = $_POST['re_pass'];

        $query = "UPDATE user_info SET Email_id='$email',UserName='$username',Password='$password' WHERE UserName='$username'";
        $result = mysqli_query($conn,$query);

        if($repass == $password){
            if($result)
            {
                echo "<div class='alert alert-success' role='alert'>Profile updated successfully</div>";

            }
            else
            {
                echo "<div class='alert alert-danger' role='alert'>Profile coudnt be updated</div>";;
            }
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>password != re-password</div>";
    }               
    }
    ?>

                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" value="<?php echo $username;?>" placeholder="Your Name" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" value="<?php echo $password;?>" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Change"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../index.php" class="signup-image-link">Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
  
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>