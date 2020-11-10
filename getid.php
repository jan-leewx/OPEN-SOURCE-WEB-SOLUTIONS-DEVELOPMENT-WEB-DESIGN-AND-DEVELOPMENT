<?php

$conn = mysqli_connect("localhost" , "root" , "" , "m3_januariuslee_190340p_db");
if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $query = mysqli_query($conn,"SELECT * FROM digital_storage WHERE id=$id");
    while($row = mysqli_fetch_assoc($query))
    {
        $imageData = $row['image'];
    }
    header("content-type:image/jpeg");
    echo $imageData;
}
else
{
    echo "Error!";
}

?>