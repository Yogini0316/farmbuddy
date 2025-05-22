<?php
	require_once "includes/config.php";

?>
<!-- link to custom js file -->
    <script type="text/javascript" src="js/main.js"></script>

<!-- <?php #include 'includes/header.php' ?> -->



<!-- Content Wrapper -->
<!-- <div id="content-wrapper" class="d-flex flex-column"> -->

    <!-- Main Content -->
    <!-- <div id="content"> -->
        <!-- table for fetching user details -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Product id</th>
                        <th>Product Name</th>
                        <th>Remaining Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr No</th>
                        <th>Product id</th>
                        <th>Product Name</th>
                        <th>Remaining Stock</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    	$result = mysqli_query($db, "SELECT * FROM stocks");
                    	$i = 0;
                    	while ($row = mysqli_fetch_assoc($result))
                    	{?>
							<tr>
								<td><?php echo ++$i?></td>
								<td><?php echo"$row[prod_id]"?></td>
								<td>
									<!-- fetching product name -->
									<?php
										$result1 = mysqli_query($db, "SELECT name FROM products, stocks WHERE products.id = $row[prod_id]");
										$prod_name = mysqli_fetch_assoc($result1)['name'];
										echo $prod_name;
									?>
								</td>
								<td><?php echo"$row[stocks_count]"?></td>
								<td>
								<button class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50">
								<i class="fas fa-pen"></i>
								</span>
								<span class="text">Edit Info</span>
								</button>

								<button class="btn btn-danger btn-icon-split" onclick="delete_user(<?php echo $row['id'];?>)">
								<span class="icon text-white-50">
								<i class="fas fa-trash"></i>
								</span>
								<span class="text">Delete</span>
								</button>

								<button class="btn btn-info btn-icon-split">
								<span class="icon text-white-50">
								<i class="fas fa-play"></i>
								</span>
								<span class="text">View</span>
								</button>
								</td>
								<!-- <td>
								<button class="btn btn-danger btn-icon-split">
								<span class="icon text-white-50">
								<i class="fas fa-trash"></i>
								</span>
								<span class="text">Delete</span>
								</button>
								</td>
								<td>
								<button class="btn btn-info btn-icon-split">
								<span class="icon text-white-50">
								<i class="fas fa-play"></i>
								</span>
								<span class="text">View</span>
								</button>
								</td>                         -->
							</tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- end of user table -->
    <!-- </div> -->
    <!-- End of Main Content -->
<!-- </div> -->
<!-- End of Content Wrapper -->
<!-- <?php #include 'includes/footer.php';?> -->