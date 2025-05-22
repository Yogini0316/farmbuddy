<?php
    session_start();
    require_once "includes/config.php";

    if(!isset($_SESSION['user']))
    {
        header("location: ../login.php");
        
    }
?>

<?php
	require_once "includes/config.php";
    $pid = $_GET['pid'];
    $uid = $_GET['uid'];
    $qty = $_GET['qty'];
    $amt = $_GET['amt'] * $qty;
    $order_status = "placed";
    $order_date = date("y-m-d h:m:s A");
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $pincode = $_POST['pincode'];
        $addr = $name .""."<br>".$_POST['addr']."<br>".$city."<br>".$pincode."<br>"."Mob :".$mobile;

        $sql = "INSERT INTO orders VALUES (NULL, '$uid', '$pid', '$qty', '$amt', '$order_status', '$order_date', '$addr')";
        $result = mysqli_query($db, $sql);

        $sql = "select * from orders where prod_id = $pid";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        if($result)
        {
            header("Location: orderConfirmed.php?oid=$id");
        }
        else {
            // echo $result->mysqli_error();
            //$_SESSION['message'] = "Sorry!<br />Order was not placed";
            //header('Location: Login/error.php');
        }
    }
?>



<!DOCTYPE html>
<html>

<head>
    <title>Home | <?php echo $_SESSION['user']; ?> </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom styles for this template-->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css links -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/header.css"> -->

    <!-- link to font-awesome -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- link to custom js file -->
    <!-- <script type="text/javascript" src="js/main.js"></script> -->

</head>

<body>

    <header>
       
        <!-- MAIN CONTAINER -->
        <div id="header-container">
            <!-- SHOP NAME -->
            <div id="shopName"><a href="index.php"> <img src="../assets/img/logo.png"> </a></div>
            <!-- COLLCETIONS ON WEBSITE -->
            <div id="collection">
                <a href="seeds.php"> Seeds </a>
                <a href="herbicides.php"> Herbicides </a>
                <a href="fungicides.php"> Fungicides </a>
                <a href="insecticides.php"> Insecticides </a>
                <a href="fertilizers.php"> Fertilizers </a>
                <!-- <h1><?php echo $pid; echo $uid;?></h1> -->
            </div>
            <!-- SEARCH SECTION -->
            <div id="search">
                <i class="fa fas fa-search search"></i>
                <input type="text" id="input" name="searchBox"
                    placeholder="Search by crops, product name or any keyword">
                <span id="search-suggestions">
                    here is suggesion
                </span>
            </div>
            <!-- USER SECTION (CART AND USER ICON) -->
            <div id="user">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow navdropdownlist">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i
                                class="fa fas fa-2x fa-user-circle"></i></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?php echo $_SESSION['user']?>
                        </a>
                        <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>

                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Orders
                                </a> -->

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </div>
        </div>
    </header>

    <section id="main" class="wrapper">
        <div class="container-sm text-center">
                <h2>Transaction Details</h2>
            <section id="two" class="wrapper style2 align-center">
                <div class="container">
                    <form method="post" action="" class="border-dark bg-light p-4 rounded-2">
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control" value="" placeholder="Name"
                                required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="city" id="city" class="form-control" value="" placeholder="City"
                                required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="mobile" id="mobile" class="form-control" value=""
                                placeholder="Mobile Number" required />
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control" value=""
                                placeholder="Email" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="pincode" id="pincode" class="form-control" value=""
                                placeholder="Pincode" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="addr" id="addr" class="form-control" value="" placeholder="Address"
                                required />
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="mb-3 form-control btn btn-primary" value="Confirm Order" />
                        </div>
                    </form>
                </div>

            </section>

        </div>
    </section>


    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../admin/js/demo/chart-area-demo.js"></script>
    <script src="../admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>