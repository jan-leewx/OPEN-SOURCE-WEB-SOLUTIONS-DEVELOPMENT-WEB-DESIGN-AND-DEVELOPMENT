<?php 
	$username = $_POST["Username"];   // name of the input field is ’username’
	$password = $_POST["pword"];
	
	$conn = mysqli_connect("localhost", "root", "","m3_januariuslee_190340p_db" );
    $sql = "SELECT * FROM user_info WHERE username = '$username' and password = '$password'"; 
    $search_result = mysqli_query($conn , $sql);   
    $userfound = mysqli_num_rows($search_result);

    if($userfound >= 1)    
	{
        session_start();
        $_SESSION["MM_usernmame"] = $username;
        $_SESSION["MM_id"] = $id;
		header("Location:members_access.php");
	}
	else     
	{
		// User record is NOT found in the userinfo table
		header("Location:members.php?fail=1");
	}
?>