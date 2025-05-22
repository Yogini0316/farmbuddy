<?php
	require_once "includes/config.php";
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		# code...
		$product_name = $_POST['prod_name'];
		$subtitle = $_POST['subtitle'];
		// $prod_type = $_POST['prod_type'];
		$price = $_POST['price'];
		$type = $_POST['type'];
		$subtype = $_POST['subtype'];
		$related_crops = $_POST['related_crops'];
		$search_tags = explode(',', $_POST['search_tags']);
		// $related_crops = $_POST['related_crops'];

		$image_location = $_FILES['product_image']['tmp_name'];
		

		// $upload_location = "".$product_name;

		

		$rmax = mysqli_query($db, "SELECT max(id) from products");
		$idmax = mysqli_fetch_assoc($rmax);
		$p_name = $idmax['max(id)']+1;
		$imageName = "$p_name." . pathinfo($_FILES['product_image']['name'],PATHINFO_EXTENSION);
		if(move_uploaded_file($image_location, "../product_images/".$imageName))
		{
			$result = mysqli_query($db, "INSERT INTO products(name, subtitle, type, price, image) values('$product_name', '$subtitle', '$type', $price, '$imageName')");
			$_SESSION['click_products']=true;
			// $_SESSION['flash_message_success'] = "Product Added Successfully";
			// header("location: ../index.php");

			if ($result) {
				# code...
				echo "<script>alert('product insertion query success')";
			}
			else
				echo "<script>alert('products record insertion error')";

		}
		else
		{
			$_SESSION['click_products']=true;
			// $_SESSION['flash_message_error'] = "Operation Failed";
			// header("location: ../index.php");

			echo "<script>alert('error in full insertion')</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CROPIFY | Add product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link to custom js file -->
    <script type="text/javascript" src="js/main.js"></script>

</head>
<body>
	<div class="container">
		<form method="POST" action="controllers/products_controller.php" enctype="multipart/form-data">
			<label>Product Name</label>
			<input type="text" name="prod_name" class="form-control" placeholder="Enter Full Product Name">

			<label>Subtitle</label>
			<input type="text" name="subtitle" class="form-control" placeholder="Enter Subtitle">

			<label>Price</label>
			<input type="text" name="price" class="form-control" placeholder="Enter Price">

			<div class="form-group">
				<label for="#select_type">Select Type</label>
				<select name="type" id="select_type" onchange="load_subtypes(this.value)">
					<?php
						$result = mysqli_query($db, "SELECT * FROM type");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<option value=$row[type]>$row[type]</option>";
						}
					?>
				</select>

				<label for="#select_subtype">Select Subtype</label>
				<select name="subtype" id="select_subtype">
					<option>Select Subtype</option>
				</select>
			</div>

			<label>Select Related Crops</label>
			<div class="form-check form-check-inline">
				<?php
					$result = mysqli_query($db, "SELECT * from crops");
					while ($row = mysqli_fetch_assoc($result)) {
						# code...
						echo"<input type=checkbox name=related_crops[] class=form-check-input value=$row[id]> $row[crop_name]";
					}
				?>
			</div>
			<label>Pick Image</label>
			<input type="file" name="product_image" id="product_image">
			<label>Enter Search Tags (separated by commas(','))</label>
			<textarea class="form-control" rows="3" placeholder="Search Tags Here (Separated By Commas(','))" name="search_tags"></textarea>


			<input type="reset" value="RESET" class="btn btn-secondary">
			<input type="submit" name="add_product" value="Add Record" class="btn btn-primary">
			
		</form>
		
	</div>

</body>
</html>