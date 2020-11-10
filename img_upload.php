<?php
    session_start();
    //List of file type 
    $allowedtype = array("image/gif" , "image/jpeg" , "image/jpg" , "image/png");

    //validate the file types
    if( in_array($_FILES["fileToUpload"]["type"] ,  $allowedtype ))
    {
        echo "File type is acceptable" . "<br />"; // proceed to upload
    }
    else
    {
        echo "Invalid file type" . "<br />";
        exit();
    }

    //validate file for size
    if ( $_FILES["fileToUpload"]["size"] < 100000000 ) // larger than 1MB
    {
        echo "File Size is acceptable" . "<br />"; // proceed to upload
    }
    else
    {
        echo " file is to large" . "<br />";
        exit();
    }

    $target = "uploaded_files/" .  $_FILES["fileToUpload"]["name"];
    $result = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $target);

    if($result)
    {
        echo "Upload Success!" . "<br />";
        if ($username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "")
        {
            $username = $_SESSION["MM_usernmame"];
        }
        else
        {
            $username = "";
        }
        doSaveData($username, $target);
    }
    else
    {
        echo "Upload FAILED!";
    }
    function doSaveData($usr, $tgt)
    {
        $conn = mysqli_connect("localhost" , "root" , "" , "m3_januariuslee_190340p_db");
        //Write an SQL statement to extract all countries from country table
        $sql = "INSERT INTO user_image (username , profileimage) VALUES ('$usr' , '$tgt')";
        //execute the SQL statement 
        $result = mysqli_query ( $conn, $sql);
        // Check result
        if($result == 1)
        {
            header("location: edit_profile.php");
            echo '<script>alert("image upload success")</script>';
        }
        else
        {
            echo "ERROR: Could not able to execute $sql.".  mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>