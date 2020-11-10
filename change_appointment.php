<?php
    session_start();
    $date = $_POST["date"];
    $time = $_POST["time"];
    $timestamp = strtotime($time) + 7200;
    $timeend = date('H:i', $timestamp);
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    if($id != "" && $username != "")
    {
        if (isset($_POST['update']))
        {
            $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db");
            // create sql statement
            $sql = "SELECT date,time,endtime FROM user_appointment WHERE date='$date' and '$time'<=endtime and '$timeend'>=time";
            $result = mysqli_query($conn , $sql);
            if(mysqli_num_rows($result) > 0)
            {
                header("location: manage_bookings.php?fails=1");
            }
            else
            {
                $sql = "UPDATE user_appointment SET date='$date', time='$time', endtime='$timeend' WHERE id='$id' AND username='$username'";
                // execute the SQL statement
                $result = mysqli_query($conn , $sql);
                if($result)
                {
                    header("location: manage_bookings.php");
                }
                else
                {
                    echo "ERROR: Could not able to execute $sql.".  mysqli_error($conn);
                }
            }
            
            mysqli_close($conn);
        }
        else if (isset($_POST['delete']))
        {
            // create database connection
            $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
            // create sql statement
            $sql = "DELETE FROM user_appointment WHERE id = $id AND username = '$username'";
            // execute the SQL statement
            $cartitems = mysqli_query($conn , $sql);
            if($cartitems)
            {
                header("location: manage_bookings.php");
            }
            else
            {
                echo "ERROR: Could not able to execute $sql.".  mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>