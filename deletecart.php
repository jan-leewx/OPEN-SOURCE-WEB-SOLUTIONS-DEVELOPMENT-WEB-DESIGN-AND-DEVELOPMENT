<?php
    session_start();
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    if($id != "" && $username != "")
    {
        // create database connection
        $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
        // create sql statement
        $sql = "DELETE FROM user_appointment WHERE id = $id AND username = '$username'";
        // execute the SQL statement
        $cartitems = mysqli_query($conn , $sql);
        mysqli_close($conn);
    }
    header("Location: cart.php");
?>