<?php
    session_start();
    require_once 'includes/config.php';

    if (!isset($_GET['id'])) {
        # code...
        header("location: ./index.php");
    }
    else
    {
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM products WHERE id = $id");
        $product = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home | {{Username}}</title>

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
            <div id="shopName"><a href="index.php"> <img src="../assets/img/lg.png"> </a></div>
            <!-- COLLCETIONS ON WEBSITE -->
            <div id="collection">
                <a href="seeds.php"> Seeds </a>
                <a href="herbicides.php"> Herbicides </a>
                <a href="fungicides.php"> Fungicides </a>
                <a href="insecticides.php"> Insecticides </a>
                <a href="fertilizers.php"> Fertilizers </a>

            </div>
            <!-- SEARCH SECTION -->
            <div id="search">
                <i class="fa fas fa-search search"></i>
                <input type="text" id="input" name="searchBox"
                    placeholder="Search by crops, product name or any keyword">
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
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout.php" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </div>


        </div>
    </header>
    <!-- End of header -->

    <div id="main">
        <div class="product_details_div p-4">
            <div class="product_image p-2">
                <img src="<?php echo "../admin/product_images/" . $product['image']; ?>">
            </div>

            <div class="product_info p-4">
                <h2 class="product_title"><?php echo $product['name']; ?></h2>

                <p class="product_subtitle"> <?php echo $product['subtitle']; ?> </p>
                <p class="price"> <?php echo $product['price']; ?> </p>

                <p class="product_description">one of two classes of natural acidic organic polymer
                    that can be extracted fromhumus found in soil, sediment, or aquatic environments.
                    The process by which humic acid forms in humus is not well understood, but the consensus
                    is that it accumulates gradually as a residue from the metabolism of microorganisms..</p>


                <form action="buynow.php" method="GET">
                    Quantity : <input class="rounded p-1" type="number" min="1" id="qty" placeholder="Quantity"
                        name="qty" value="1">
                    <input type="hidden" name="pid" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="uid" value="<?php echo $id; ?>">
                    <input type="hidden" name="amt" value="<?php echo $product['price']; ?>">
                    <button type="submit" class="btn btn-primary">Buy Now</button>

                </form>
            </div>
        </div>
    </div>
    <!--ENd Of main div-->

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