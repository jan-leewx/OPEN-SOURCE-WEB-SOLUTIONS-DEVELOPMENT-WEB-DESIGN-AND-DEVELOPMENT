<?php
    session_start();
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $newUsername = $_POST["Username"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $num = $_POST["Contact_Number"];
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";
    
    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db");
    // create sql statement
    $sql = "UPDATE user_info SET firstname='$fname', lastname='$lname', gender='$gender', email='$email',
    username='$newUsername', address='$address', dateofbirth='$dob', contactnum='$num' WHERE username='$username'";
    // execute the SQL statement
    $sql2 = "UPDATE user_image SET username='$newUsername' WHERE username='$username'";
    $sql3 = "UPDATE pet_info SET username='$newUsername' WHERE username='$username'";
    $sql4 = "UPDATE pet_image SET username='$newUsername' WHERE username='$username'";
    $sql5 = "UPDATE user_appointment SET username='$newUsername' WHERE username='$username'";
    $sql6 = "UPDATE digital_storage SET username='$newUsername' WHERE username='$username'";
    $sql7 = "UPDATE referal_codes SET username='$newUsername' WHERE username='$username'";
    $result = mysqli_query($conn , $sql);
    $result = mysqli_query($conn , $sql2);
    $result = mysqli_query($conn , $sql3);
    $result = mysqli_query($conn , $sql4);
    $result = mysqli_query($conn , $sql5);
    $result = mysqli_query($conn , $sql6);
    $result = mysqli_query($conn , $sql7);
    if($result)
    {
        header("location: edit_profile.php");
        $_SESSION["MM_usernmame"] = $newUsername;
    }
    else
    {
        echo "ERROR: Could not able to execute $sql.".  mysqli_error($conn);
    }
    mysqli_close($conn);
?>