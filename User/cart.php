<?php
    session_start();
    require_once "includes/config.php";

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
        <section>
            <div id="content_wrapper">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="card-header">
                            <center>
                                <h2 class="fas fa-shopping-cart">
                                    My Cart
                                </h2>
                            </center>
                            <div class="card-body">
                                <div class="table_responsive">
                                    <table class="table text-center" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $username = $_SESSION['user'];
                                        $userResult = mysqli_query($db, "SELECT * FROM user where email='$username'") or die("query user error");
                                        $rowuser = mysqli_fetch_row($userResult);
                                        $id = $rowuser[0];
                                        
                                        $result = mysqli_query($db, "SELECT * FROM cart where user_id = $id") or die("query error");
                                        $cart_id="";
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            $cart_id = $row['id'];
                                        }
                
                                    $CartResult = mysqli_query($db, "SELECT * FROM cart_item where cart_id = $cart_id");
                                    while ($cartRow = mysqli_fetch_assoc($CartResult))
                                    {
                                        $result2 = mysqli_query($db, "SELECT * FROM products where id =". $cartRow['prod_id']."");
                                        $prodRow = mysqli_fetch_assoc($result2);
                                      
                                        ?>

                                            <tr>

                                                <td><img src="<?php echo "../admin/product_images/" . $prodRow['image']; ?>"
                                                        alt="product-image" style="width:50%;height:50%;"></td>
                                                <td><?php echo $prodRow['name']; ?><br><?php echo $prodRow['subtitle']; ?><br>Type
                                                    : <?php echo $prodRow['type']; ?></td>
                                                <td><?php echo $cartRow['qty']; ?></td>
                                                <td>&#8377 <?php echo $prodRow["price"]; ?></td>
                                                <td>&#8377 <?php echo $cartRow['qty'] * $prodRow["price"]; ?></td>
                                                <td> <a class="btn btn-danger" type="button"
                                                        onclick="return confirm('Are you sure?')"
                                                        href="delete.php?action=delete&id=<?php echo $cartRow["id"]; ?>">Remove</a>
                                                        <a href="buynow.php?pid=<?php echo $cartRow["prod_id"]; ?>&uid=<?php echo $id; ?>&qty=<?php echo $cartRow['qty']; ?>&amt=<?php echo $cartRow['qty'] * $prodRow["price"]; ?>"><button class="btn btn-warning">Buy Now</button></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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