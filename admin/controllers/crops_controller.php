<!-- This is the Crops controller every action regarding Crops passed here and certain action performerd with database and file uploading -->
<script type="text/javascript" src="../js/main.js">
</script>
<?php
	session_start();

	require_once "../includes/config.php";

	// for product insertion

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_crop'])) {
		# code...

		$crop_name = $_POST['crop_name'];
		$result = mysqli_query($db, "INSERT INTO crops(crop_name) values('$crop_name')");

		if($result)
		{
			
			$_SESSION['click_crops'] = true;
			$_SESSION['flash_message_success'] = "Record Successfully Added";
			header("location: ../index.php");
			
		}
		else
		{	
			$_SESSION['click_crops'] = true;
			$_SESSION['flash_message_error'] = "Error In Inertion";
			header("location: ../index.php");
		}
	}

	// for deletion of the crops

	if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['delete_crop']) || isset($_GET['crop_to_delete'])) {
		# code...
		if(isset($_GET['crop_to_delete']))
			$crop_id = $_GET['crop_to_delete'];	
		else
			$crop_id = $_POST['crop_to_delete'];

		$result = mysqli_query($db, "DELETE FROM crops WHERE id = $crop_id");

		if($result)
		{
			$_SESSION['click_crops'] = true;
			$_SESSION['flash_message_success'] = "Record Deleted";
			header("location: ../index.php");
		}
		else
		{
			$_SESSION['click_crops'] = true;
			$_SESSION['flash_message_error'] = "Error in deleting record";
		}
	}


?>