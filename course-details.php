<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clever - Education &amp; Courses Template | Single Course</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> 

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> 

</head>

<body>
<?php 
        include 'check-header.php'
        ?>
    <?php
        $conn=mysqli_connect("localhost","root","","project");
        if(!$conn)
            echo "Connection failed".mysqli_connect_error();
        else{}
        if(isset($_GET['id_course'])){
            $id_course=$_GET['id_course'];
        }
        
        $query = "SELECT `Id_course`, `Name_course`,`Id_categories`, `Description`, `Image` FROM `course` Where `Id_course`= ".$id_course;
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result))
            {
                
                $id = $row[0];
                $tt = $row[1];
                
                $des = $row[3];
                $img = $row[4];
                $url = $row[0];
            }
            $a=0;
            $b=0;
        if(isset($_SESSION["username"])){
            $query4 = "SELECT User_id from user_info where UserName='".$_SESSION["username"]."'";
            $result4 = mysqli_query($conn,$query4);
            while($row4 = mysqli_fetch_array($result4)){
                $id_user1=$row4[0];
            }
            $query5="SELECT * FROM course_ofuser where id_course=".$id_course." and id_user=".$id_user1;
            $result5 = mysqli_query($conn,$query5);
            while($row5 = mysqli_fetch_array($result5)){
                $a=$row5["id_course"];
            }
            $query6="SELECT * FROM votes where id_course=".$id_course." and id_user=".$id_user1;
            $result6 = mysqli_query($conn,$query6);
            while($row6 = mysqli_fetch_array($result6)){
                $b=$row6["id_vote"];
            }
        }
        
        $query1 ="SELECT * FROM votes Where `Id_course`= ".$id_course;
        $result1 = mysqli_query($conn,$query1);

    ?>

    <div class="breadcumb-area">
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $tt ?></a></li>

            </ol>
        </nav>
    </div>
    <div class="single-course-intro d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/bg3.jpg);">
        <div class="single-course-intro-content text-center">
            <div class="ratings">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <h3><?php echo $tt ?></h3>
            <div class="meta d-flex align-items-center justify-content-center">
                <a href="#">Sarah Parker</a>
                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                <a href="#">Art &amp; Design</a>
            </div>
            <div class="price">Free</div>
        </div>
    </div>
    <!-- ##### Single Course Intro End ##### -->

    <!-- ##### Courses Content Start ##### -->
    <div class="single-course-content section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="course--content">

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                        <!-- About Course -->
                                        <div class="about-course mb-30">
                                            <h4>About this course</h4>
                                            <p><?php echo $des ?></p>
                                        </div>

                                        <!-- All Instructors -->
                                        <div class="all-instructors mb-30">
                                            <h4>All Instructors</h4>

                                            <div class="row">
                                                <!-- Single Instructor -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t1.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Instructor -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t2.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Instructor -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t3.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Instructor -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t4.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FAQ -->
                                        <div class="clever-faqs">
                                            <h4>FAQs</h4>

                                            <div class="accordions" id="accordion" role="tablist" aria-multiselectable="true">

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Can I just enroll in a single course? I'm not interested in the entire Specialization?
                                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    </a></h6>
                                                    <div id="collapseOne" class="accordion-content collapse show">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor.</p>
                                                    </div>
                                                </div>

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6>
                                                        <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">What is the refund policy?
                                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapseTwo" class="accordion-content collapse">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis.</p>
                                                    </div>
                                                </div>

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6>
                                                        <a role="button" aria-expanded="true" aria-controls="collapseThree" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">What background knowledge is necessary?
                                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapseThree" class="accordion-content collapse">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis.</p>
                                                    </div>
                                                </div>

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6>
                                                        <a role="button" aria-expanded="true" aria-controls="collapseFour" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseFour">Do i need to take the courses in a specific order?
                                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapseFour" class="accordion-content collapse">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                                    <div class="clever-review">

                                        <!-- About Review -->

                                        <!-- Ratings -->
                                        <div class="clever-ratings d-flex align-items-center mb-30">

                                            <div class="total-ratings text-center d-flex align-items-center justify-content-center">
                                                <div class="ratings-text">
                                                    <h2>4.5</h2>
                                                    <div class="ratings--">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>
                                                    <span>Rated 5 out of 3 Ratings</span>
                                                </div>
                                            </div>

                                            <div class="rating-viewer">
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>5 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>80%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>4 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>20%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>3 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>2 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>1 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single Review -->
                                        <?php
                                            if($result1){
                                            while($row1 = mysqli_fetch_array($result1))
                                                    {
                                                        
                                                        $id_vote = $row1[0];
                                                        $id_user = $row1[1];
                                                        $cmt = $row1[2];
                                                        $id_course = $row1[3];
                                                        $vote = $row1[4];
                                                        $date=$row1[5];
                                                        $querya = "SELECT UserName from user_info where User_id=".$id_user;
                                                        $resulta = mysqli_query($conn,$querya);
                                                        $name_usera="a";
                                                        while($rowa = mysqli_fetch_array($resulta)){
                                                            $name_usera=$rowa[0];
                                                        }
                                        ?>
                                        <div class="single-review mb-30">
                                            <div class="d-flex justify-content-between mb-30">
                                                <!-- Review Admin -->
                                                <div class="review-admin d-flex">
                                                    <div class="thumb">
                                                        <img src="img/bg-img/t1.png" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h6><?php echo $name_usera ?></h6>
                                                        <span><?php echo $date ?></span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                <?php for($i=1;$i<=$vote;$i++){ ?>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                <?php }?>
                                                <?php for($i=$vote+1;$i<=5;$i++){ ?>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <?php }?>
 
                                                </div>
                                            </div>
                                            <p><?php echo $cmt ?></p>
                                        </div>

                                        <?php 
                                                    }}else{
                                                       echo $query1; 
                                                    }
                                        ?>
                                        <?php if($a&&(!$b)){ ?>
                                        <div class="single-review mb-30">
                                            <form action="" method="post">
                                            <div class="user-rating ratings">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            <br>
                                            <div class="user-cmt">
                                                <textarea rows="10" cols="50" class="form-control comments" 
                                            placeholder="Your comment" id="comments" name="comment" ></textarea>
                                            </div>
                                            <br>
                                            <button class="rate btn clever-btn mb-30 " name="submit">Comment</button>
                                            </form>
                                        </div>
                                        <?php }?>
                                        <!-- Single Review -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="course-sidebar">
                        <!-- Buy Course -->
                        <?php  if($a){ ?>
                        <a href="video.php?id_course=<?php echo $id?>" class="btn clever-btn mb-30 w-100">What Video</a>
                        <?php }else{?>
                        <a href="signcourse.php?id_course=<?php echo $id?>" class="btn clever-btn mb-30 w-100">Buy course</a>
                        <?php } ?>
                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>Course Features</h4>
                            <ul class="features-list">
                                <li>
                                    <h6><i class="fa fa-clock-o" aria-hidden="true"></i> Duration</h6>
                                    <h6>2 Weeks</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-bell" aria-hidden="true"></i> Lectures</h6>
                                    <h6>10</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-file" aria-hidden="true"></i> Quizzes</h6>
                                    <h6>3</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-thumbs-up" aria-hidden="true"></i> Pass Percentage</h6>
                                    <h6>60</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-thumbs-down" aria-hidden="true"></i> Max Retakes</h6>
                                    <h6>5</h6>
                                </li>
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>Certification</h4>
                            <img src="img/bg-img/cer.png" alt="">
                        </div>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>You may like</h4>

                            <!-- Single Courses -->
                            <div class="single--courses d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/bg-img/yml.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h5>Vocabulary</h5>
                                    <h6>$20</h6>
                                </div>
                            </div>

                            <!-- Single Courses -->
                            <div class="single--courses d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/bg-img/yml2.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h5>Expository writing</h5>
                                    <h6>$45</h6>
                                </div>
                            </div>

                            <!-- Single Courses -->
                            <div class="single--courses d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/bg-img/yml3.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h5>Vocabulary</h5>
                                    <h6>$20</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            $cmt = $_POST['comment'];
            $queryb = "INSERT INTO votes (id_user,comment,id_course,vote) VALUES('$id_user1','$cmt','$id_course','4')";
                            $resultb = mysqli_query($conn,$queryb);
                        }
    ?>
    <!-- ##### Courses Content End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Top Footer Area -->
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite -->
                        <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area d-flex justify-content-between align-items-center">
            <!-- Contact Info -->
            <div class="contact-info">
                <a href="#"><span>Phone:</span> +44 300 303 0266</a>
                <a href="#"><span>Email:</span> info@clever.com</a>
            </div>
            <!-- Follow Us -->
            <div class="follow-us">
                <span>Follow us</span>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>