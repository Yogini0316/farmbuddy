<?php
require_once "includes/config.php";
$id = $_GET['id'];
$CartResult = mysqli_query($db, "DELETE FROM cart_item where id = $id");
header("location:cart.php");
?>