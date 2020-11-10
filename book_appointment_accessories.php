<?php
    session_start();
    $category = $_POST['category'];
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";

    // create database connection
    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
    // create sql statement
    $sql = "UPDATE user_appointment SET Accessories='$category' WHERE username='$username'";
    // execute the SQL statement
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        header("location: book_appointments_addon.html");
    }
    else
    {
        header("location: book_appointments_addon.html");
    }
    mysqli_close($conn);
?>