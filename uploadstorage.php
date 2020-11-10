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
        header("location: digital_storage.php?fail=1");
        exit();
    }

    //validate file for size
    if ( $_FILES["fileToUpload"]["size"] < 100000000 ) // larger than 1MB
    {
        echo "File Size is acceptable" . "<br />"; // proceed to upload
    }
    else
    {
        header("location: digital_storage.php?fail2=1");
        exit();
    }

    $target = "digital_storage/" .  $_FILES["fileToUpload"]["name"];
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
        $sql = "INSERT INTO digital_storage (username , image) VALUES ('$usr' , '$tgt')";
        //execute the SQL statement 
        $result = mysqli_query ( $conn, $sql);
        // Check result
        if($result == 1)
        {
            header("location: digital_storage.php");
            echo '<script>alert("image upload success")</script>';
        }
        else
        {
            echo "ERROR: Could not able to execute $sql.".  mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>