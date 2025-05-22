<?php
    session_start();
    require_once 'includes/config.php';
    if(!isset($_SESSION['user']))
    {
        header("location: ../login.php");
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
    <script src="../admin/main.js"></script>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body>

    <header>
        <!-- MAIN CONTAINER -->
        <div id="header-container">
            <!-- SHOP NAME -->
            <div id="shopName"><a href="./index.php"> <img src="../assets/img/lg.png"> </a></div>
            <!-- COLLCETIONS ON WEBSITE -->
            <div id="collection">
                <a href="seeds.php"> Seeds </a>
                <a href="herbicides.php"> Herbicides </a>
                <a href="fungicides.php"> Fungicides </a>
                <a href="insecticides.php"> Insecticides </a>
                <a href="fertilizers.php"> Fertilizers </a>

            </div>
            <!-- SEARCH SECTION -->
            <form method="POST" action="./Search.php">
            <div class="container-fluid row my-2">
	            <div class="col-10">
		            <input type="text" placeholder="Search by crops, product name or any keyword" class="form-control" name="search">
	            </div>
	            <div class="col-2">
	        	    <button class="btn btn-outline-dark">Search</button>		
	            </div>
            </div>
            </form>
            <!-- USER SECTION (CART AND USER ICON) -->
            <div id="user">
                <a href="cart.php">
                    <i class="fa fa-2x fas fa-shopping-cart addedToCart">
                        <div id="badge">
                            <?php
                                        $username = $_SESSION['user'];
                                        $result = mysqli_query($db, "SELECT * FROM user where email='$username'") or die("query user error");
                                        $rowuser = mysqli_fetch_row($result);
                                        $id = $rowuser[0];

                                        // for cart id
                                        $result = mysqli_query($db, "SELECT * FROM cart where  user_id=$id") or die("query user error");
                                        $rowcart = mysqli_fetch_row($result);
                                        $cart_id = $rowcart[0];

                                        $result = mysqli_query($db, "SELECT * from cart_item where cart_id = $cart_id");
                                        $count = 0;
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $count++;
                                        }
                                        echo $count;
                                    ?>
                        </div>
                    </i>
                </a>
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


    <div id="main">
        <section class="section-herbicides">
            <h1 class="section-heading">Herbicides</h1>
            <!-- product fetcher begins -->
            <div class="products-fetcher">
                <!-- product card begins apply php code here -->
                <?php
                    $result = mysqli_query($db, "SELECT * FROM products WHERE type='protectors' limit 10");

                    while ($row = mysqli_fetch_assoc($result))
                    {?>
                <div class="product-card p-2">
                    <div class="card-img text-center">
                        <img src="<?php echo "../admin/product_images/" . $row['image'];?>">
                    </div>
                    <strong>
                        <p class="product-name"><?php echo $row['name'];?></p>
                    </strong>
                    <p> &#8377; <?php echo $row['price'];?></p>
                    <form action="add_to_cart.php" method="POST">
                        Quantity : <input class="form-control my-1" type="number" min="1" name="qty"
                            placeholder="Quantity" value="1">
                        <input type="hidden" name="uid" value="<?php echo $id; ?>">
                        <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                        <div class="row">
                            <div class="col-sm-6"> <button class="btn btn-warning" type="submit"><i
                                        class="fa fa-shopping-cart"></i> Add to cart</button></div>
                            <div class="col-sm-6"><a href="product_details.php?id=<?php echo $row['id'];?>"><button
                                        type="button" class="btn btn-primary">More Details</button></a></div>
                        </div>
                    </form>
                </div>

                <?php }
                ?>
            </div>
            <!-- end of product fetcher -->
        </section>
    </div>

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