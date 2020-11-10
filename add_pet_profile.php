<?php
    session_start();
    $pname = $_POST["pname"];
    $gender = $_POST["gender"];
    $breed = $_POST["Pet/Breed"];
    $dob = $_POST["dob"];
    $petpersonality = $_POST["personality"];
    $username = isset($_SESSION["MM_usernmame"]) ? $_SESSION["MM_usernmame"] : "";
    
    $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db");
    // create sql statement
    $sql = "INSERT INTO pet_info (username, petname, petgender, petdateofbirth, petBreed, petpersonality) 
    VALUES ('$username', '$pname', '$gender', '$dob', '$breed', '$petpersonality')";
    // execute the SQL statement
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        header("location: pet_profile.php");
    }
    else
    {
        echo "ERROR: Could not able to execute $sql.".  mysqli_error($conn);
    }
    mysqli_close($conn);
?>