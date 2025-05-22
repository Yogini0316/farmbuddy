<?php
	session_start();
	session_destroy(); 	//Destroys all sessions and transfer control to admin login page

	header("location: ../login.php");

?>