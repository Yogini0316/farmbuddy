<?php
$db = mysqli_connect("localhost", "root", '') or die("Failed to connect to MySql.");
mysqli_select_db($db,"CROPIFY") or die("Failed to connect to database");
?>