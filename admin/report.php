
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FARMBUDDY | Admin-Dashboard</title>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link to custom js file -->
    <script type="text/javascript" src="js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body id="page-top">

    <?php if (isset($_SESSION['flash_message_success']))
    {?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo "$_SESSION[flash_message_success]";?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="window.reload()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['flash_message_success']); 
    } ?> 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <img src="../assets/img/logo.png" class="site-logo">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a href="index.php"><i fa fas fa-cross></i> Close</a>
                            

                        </li>
                        <button class="btn btn-success" onclick="window.print()">
                            Print                                
                        </button>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                           <!--  <a class="nav-link btn-danger" href="index.php" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Close</span>
                                <i class="fa fas fa-cross 2x"></i>
                            </a> -->
                            <button class="btn btn-secondary" onclick=location.href="index.php">
                                Close                                
                            </button>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Average Daily Active Users</th>
                                    <td>20</td>
                                </tr>

                                <tr>
                                    <th>Total Users</th>
                                    <td>60</td>
                                </tr>

                                <tr>
                                    <th>Pending Orders</th>
                                    <td>25</td>
                                </tr>

                                <tr>
                                    <th>Total Amount of pending orders</th>
                                    <td>50340 &#8377;</td>
                                </tr>

                                <tr>
                                    <th>Total Delivered Orders</th>
                                    <td>20</td>
                                </tr>

                                <tr>
                                    <th>Top 5 Best Selling Products</th>
                                    <td>1. Bayer Mosanto Roundup Glyphosate 41% SL. <br>
                                        2. MAHYCO - MAHY WARAD GOLD BOTTLE GOURD <br>
                                        3. Katra Lysorus Anti-Virus and Anti-Bacteria (1 GM Lysorus Powder + 50 ML Activator)
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total Sales Amount</th>
                                    <td>45020 &#8377;</td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="includes/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>