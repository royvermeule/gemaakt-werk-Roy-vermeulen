<?php
//including the connect from the database
include("./db/dbConnect.php");
//checking if you are connected
if(!$conn){
    die('error in db' . mysqli_error($conn));
}
//id to delete the item
$id = $_GET['id'];
// delete function
$try="DELETE FROM `products` WHERE `id`= $id";
//refresh the page
if(mysqli_query($conn, $try)){
    header("Refresh: 0; ./warehous-items-manager.php");
}else{
    echo mysqli_error($conn);
}

?>