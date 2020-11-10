<?php
    session_start();
    $promocode = $_POST["code"];
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";
    
    // create database connection
    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
    // create sql statement
    $sql = "DELETE FROM referal_codes WHERE username = '$username' AND codes = '$promocode'";
    // execute the SQL statement
    $cartitems = mysqli_query($conn , $sql);
    mysqli_close($conn);
    header("Location: cart.php");
?>