<!-- This is the products controller every action regarding products passed here and certain action performerd with database and file uploading -->

<?php
	session_start();

	require_once "../includes/config.php";

	// for product insertion

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_product'])) {
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

			foreach ($related_crops as $key => $value) {
				# code...
				$result1 = mysqli_query($db, "INSERT INTO related_crops values($p_name, $value)");
			}
			for ($i=0; $i < sizeof($search_tags); $i++) { 
				# code...
				$tag = trim($search_tag[$i]);
				$result1 = mysqli_query($db, "INSERT INTO search_tags(prod_id, tag_name) values($p_name, '$tag')");

			}
			$_SESSION['click_products']=true;
			$_SESSION['flash_message_success'] = "Product Added Successfully";
			header("location: ../index.php");
		}
		else
		{
			$_SESSION['click_products']=true;
			$_SESSION['flash_message_error'] = "Operation Failed";
			header("location: ../index.php");
		}
	}


	// for deletion of products
	if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['delete_product']) || isset($_GET['product_to_delete'])) {
		# code...
		if(isset($_GET['product_to_delete']))
			$product_id = $_GET['product_to_delete'];	
		else
			$product_id = $_POST['product_to_delete'];

		$result = mysqli_query($db, "DELETE FROM products WHERE id = $product_id");

		if($result)
		{
			$_SESSION['click_products'] = true;
			$_SESSION['flash_message_success'] = "Record Deleted";
			header("location: ../index.php");
		}
		else
		{
			$_SESSION['click_product'] = true;
			$_SESSION['flash_message_error'] = "Error in deleting record";
		}
	}


?>