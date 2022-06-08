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
$try="DELETE FROM `users` WHERE `id`= $id";
//refresh the page
if(mysqli_query($conn, $try)){
    header("Refresh: 0; ./registerSuperUser.php");
}else{
    echo mysqli_error($conn);
}

?>