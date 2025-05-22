<?php
    session_start();
    require_once "../includes/config.php";

    if(isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['register']))
    {
        $mobile_number = $_POST['mobile_number'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $password = $_POST['password'];


        $result = mysqli_query($db, "INSERT INTO user(mobile_number, email, name, address, state, city, pincode, password) VALUES($mobile_number, '$email', '$name', '$address', '$state', '$city', $pincode, '$password')");

        if($result)
        {
            $_SESSION['flash_message_success'] = "Successfully Registered  Login by email and password";
            header("location: ../../login.php");
        }
        else
        {
            $_SESSION['flash_message_error'] = "Error in registration please try again";
            header("location: ../../register.php");
        }

    }

    if(isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($db, "SELECT * FROM user WHERE email = '$username' AND password = '$password'");

        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['user'] = $username;
            header("location: ../index.php");
        }
        else
        {
            unset($_SESSION['user']);
            $_SESSION['flash_message_error'] = "Invalid Login Credentials";
            header("location: ../../login.php");
            

        }

    }
?>