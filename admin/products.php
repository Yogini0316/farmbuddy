<?php require_once "includes/config.php";?>

<script type="text/javascript" src="../assets/js/main.js"></script>

<style type="text/css">
    .product-image {
        width: 90px;
        height: 90px;
    }
</style>

<div class="container-fluid row my-2">
	<div class="col-10">
		<input type="text" placeholder="Search..." class="form-control" name="">
	</div>
	<div class="col-2">
		<button class="btn btn-outline-dark">Search</button>		
	</div>
</div>
<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Subtitle</th>
                        <th>type</th>
                        <!-- <th>Related Crops</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr No.</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Subtitle</th>
                        <th>type</th>
                        <!-- <th>Related Crops</th> -->
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $i = 0; // Helping variable for sr no counter..
                    	$result = mysqli_query($db, "SELECT * FROM products") or die("query error");
                    	while ($row = mysqli_fetch_assoc($result))
                    	{?>
							<tr>
								<td><?php echo ++$i;?></td>
                                <td><img src="<?php echo "product_images/".$row['image']; ?>" class="img-thumbnail product-image" alt="..."></td>
								<td><?php echo"$row[name]"?></td>
								<td><?php echo"$row[subtitle]"?></td>
								<td><?php echo"$row[type]"?></td>
								<!-- <td>
									<?/*php
										$result1 = mysqli_query($db, "SELECT * from related_crops where prod_id = $row[id]");
										while ($row1 = mysqli_fetch_assoc($result1)) {
                                            $cid = $row1['crop_id'];
											$result2 = mysqli_query($db, "SELECT * from crops where id=$cid");
                                                echo mysqli_fetch_assoc($result2)['crop_name']. ", ";
										}
									*/?>		
								</td> -->
								<td>
								<!-- <button class="btn btn-primary btn-icon-split" onlclick="">
								  <span class="icon text-white-50">
								    <i class="fas fa-pen"></i>
								  </span>
								  <span class="text">Edit Info</span>
								</button> -->

								<button class="btn btn-danger btn-icon-split" onclick="delete_product(<?php echo "$row[id]"; ?>)">
								<span class="icon text-white-50">
								<i class="fas fa-trash"></i>
								</span>
								<span class="text">Delete</span>
								</button>

								<!-- <button class="btn btn-info btn-icon-split">
								<span class="icon text-white-50">
								<i class="fas fa-play"></i>
								</span>
								<span class="text">View</span>
								</button>
								</td> -->
							</tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


<!-- modals -->

<!-- modal for adding products -->

<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new product information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="controllers/products_controller.php"  enctype="multipart/form-data">
        	<label>Enter Name</label>
        	<input type="text" class="form-control" id="inputprod_name" name="prod_name">

        	<label>Enter Subtitle</label>
        	<input type="text" class="form-control" id="inputsubtitle" name="subtitle">

        	<label>Enter Types Separated by spaces</label>
        	<input type="text" class="form-control" id="inputprod_type" name="prod_type">

        	<label>Select Related Crops : </label>
        	<?php
        		$result = mysqli_query($db, "SELECT * FROM crops");

        		while ($row = mysqli_fetch_assoc($result)) {
        			# code...
              ?> 
              <br>
              <input type="checkbox" name="related_crops" value="<?php echo $row['id'];?>">
              <?php
              echo "<span>".$row['crop_name']."</span>" ;

        			// echo "<input type=checkbox name=related_crops value=$row[id]> <label class=form-check-label for=check> $row[crop_name] </label>";
        		}

        	?>

           <br><label>Enter Price :</label>
            <input type="text" class="form-control" id="inputprice" name="price">
            <label>Select Product Image : </label>
        	<input type="file" name="product_image" id="product_image">

        	<input type="submit" class="btn btn-primary" value="Add" name="add_product">
        	<input type="reset" class="btn btn-secondary" name="">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>




<!-- 
    to add products
    required 

        name (can be very large)
        subtitle (small name for product)
        price (accept price)
        type (seed, protector, nutrients)
            seed can be hy
        related crops, search tags, 
 -->