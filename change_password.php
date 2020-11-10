<?php
    session_start();
    $cpass = $_POST["cpword"];
    $npass = $_POST["npword"];
    $cfmpass = $_POST["cfmnpword"];
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";

    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db");
    // create sql statement
    if($npass==$cfmpass && $cpass!=$npass)
    {
        $sql = "UPDATE user_info SET password='$npass' WHERE username='$username'";
        // execute the SQL statement
        $result = mysqli_query($conn , $sql);
        if($result)
        {
            header("Location:edit_profile.php?success=1");
        }
        else
        {
            header("Location:edit_profile.php?fail=1");
        }
    }
    mysqli_close($conn);
?>