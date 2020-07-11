<!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <header class="header-area">

        <!-- Top Header Area -->

        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <!-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="courses.php">Courses</a></li>
                                        <li><a href="single-course.php">Single Courses</a></li>
                                        <li><a href="instructors.php">Instructors</a></li>
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="blog-details.php">Single Blog</a></li>
                                        <li><a href="regular-page.php">Regular Page</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="courses.php">Courses</a></li>
                                <!-- <li><a href="instructors.php">Instructors</a></li>
                                <li><a href="blog.php">Blog</a></li> -->
                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search" onkeyup="searchCourse(this.value)">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Register / Login -->
                            <div class="register-login-area">
                                <a href="su/register.php" class="btn">Register</a>
                                <a href="su/login.php" class="btn active">Login</a>
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <script>
        function searchCourse(str) {
            if (str == "") {
                document.getElementById("course-list").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("course-list").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","search.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>
    