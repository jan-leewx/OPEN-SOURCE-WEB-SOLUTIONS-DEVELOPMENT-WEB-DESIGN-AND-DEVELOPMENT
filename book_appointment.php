<?php
    session_start();
    $date = $_POST['newQty'];
    $time = $_POST['newTime'];
    $timestamp = strtotime($time) + 7200;
    $timeend = date('H:i', $timestamp);
    $category = $_POST['category'];
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";

    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
    $sql = "SELECT date,time,endtime FROM user_appointment WHERE date='$date' and '$time'<=endtime and '$timeend'>=time";
    $result = mysqli_query($conn , $sql);
    if(mysqli_num_rows($result) > 0)
    {
        header("location: book_appointments.php?fails=1");
    }
    else
    {
        // create sql statement
        $sql = "INSERT INTO user_appointment (username, date, time, endtime, category) VALUES ('$username', '$date', '$time', '$timeend', '$category')";
        // execute the SQL statement
        $result = mysqli_query($conn , $sql);
        if($result)
        {
            header("location: book_appointments_addon.html");
        }
        else
        {
            header("location: book_appointments.php");
        }
        mysqli_close($conn);
    }
?>