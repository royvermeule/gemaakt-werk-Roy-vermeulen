<?php
include('./db/dbConnect.php');
session_start();
// var_dump($_SESSION);

// Userrole is an easier way to give permissions to the specific user
switch ($_SESSION["UserRoll"]) {
    case "super-user":
        $userRole = "1";
    break;
        
    case "warehouse-admin":
        $userRole = "2";
    break;
            
    case "financial-admin":
        $userRole = "3";
    break;
    
    case "student":
        $userRole = "4";
    break;
    
    default;
        session_unset();
        header("Refresh 0; ./index.php");
}
?>