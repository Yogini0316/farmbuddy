<?php
    session_start();

    if(isset($_SESSION['flash_message_error']))
    {?>
        <div class="alert alert-Danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['flash_message_error']; unset($_SESSION['flash_message_error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home | FARMBUDDY</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.4.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-end justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/lg.png" alt="">
                <!-- <span>FlexStart</span> -->
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                    <li><a class="getstarted scrollto" href="login.php">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->



    <main id="main">
        <div class="container">
            <div class="row justify-content-center my-5">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img src="assets/img/lg.png">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Register Here!</h1>
                                        </div>
                                        <form class="user" method="POST" action="./User/controllers/user_controller.php" name="registration_form">
                                            <input type="text" name="mobile_number" placeholder="Enter Mobile Number"
                                                class="form-control" maxlength="10">
                                            <input type="email" name="email" placeholder="Enter Email"
                                                class="form-control">
                                            <input type="text" name="name" id="" placeholder="Enter Name"
                                                class="form-control">
                                            <input type="text" name="address" id="" placeholder="Enter Address"
                                                class="form-control">

                                            <div class="form-group d-flex justify-content-between">
                                                <label for="state">Select State</label>
                                                <select name="state" id="state">
                                                    <option value="maharashtra">Maharashtra</option>
                                                    <option value="Andhra_Pradesh">Andhra Pradesh</option>
                                                    <option value="gujrat">Gujrat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                </select>

                                                <label for="city">Select City</label>
                                                <select name="city" id="city">
                                                    <option value="Pune">Pune</option>
                                                    <option value="Nashik">Nashik</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Satara">Satara</option>
                                                    <option value="Jalgaon">Jalgaon</option>
                                                </select>
                                            </div>

                                            <input type="number" name="pincode" id="pincode" placeholder="Enter Pin Code" class="form-control">

                                            <div class="form-group d-flex justify-content-between">
                                                <input type="password" name="password" id="password"
                                                    placeholder="Enter Password">
                                                <input type="password" name="cpassword" id="cpassword"
                                                    placeholder="Re-Enter Password" onkeyup="validate_password()">
                                                <span id="password_prompt"></span>

                                            </div>
                                            <hr>

                                            <div class="form-group d-flex justify-content-between">
                                                <input type="reset" value="Reset" class="btn btn-secondary">
                                                <input type="submit" value="Submit" class="btn btn-success" name="register">
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright">
                &; <strong><span>FARMBUDDY 2021</span></strong>. Developed By Krutika Vasulkar & Sakshi Deore
            </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>