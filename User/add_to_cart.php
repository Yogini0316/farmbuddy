<?php
    session_start();
    require_once 'includes/config.php';
    if(!isset($_SESSION['user']))
    {
        header("location: ../login.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_id = $_POST['uid'];
        $prod_id = $_POST['pid'];
        $qty = $_POST['qty'];

        // cart id
        $result = mysqli_query($db, "SELECT * FROM cart where user_id = $user_id");
        $row = mysqli_fetch_row($result);
        $cart_id = $row[0];
        $result =  mysqli_query($db, "SELECT * FROM products where id = $prod_id");
        $rowprice = mysqli_fetch_row($result);
        $cost = $rowprice[4];
        $result = mysqli_query($db, "INSERT into cart_item(cart_id, prod_id, qty, total_cost) values($cart_id, $prod_id, $qty, $cost)");
        header("location: index.php");
    }


?>

