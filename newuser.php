<?php
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $newUsername = $_POST["newUsername"];
    $npword = $_POST["npword"];
    $cfmpword = $_POST["cfmnpword"];
    
    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db");
    // create sql statement
    if($npword == $cfmpword)
    {
        $sql = "SELECT username,email FROM user_info WHERE username='$newUsername' and email='$email'";
        $result = mysqli_query($conn , $sql);
        if(mysqli_num_rows($result) > 0)
        {
            header("Location:members.php?fails=1");
        }
        else
        {
            $sql = "INSERT INTO user_info (firstname, lastname, email, username, password) 
            VALUES ('$fname','$lname','$email','$newUsername','$npword')";
            // execute the SQL statement
            $result = mysqli_query($conn , $sql);
            if($result)
            {
                header("Location:members.php?success=1");
            }
            else
            {
                header("Location:members.php?fails2=1");
            }
        }
    }
    mysqli_close($conn);
?>