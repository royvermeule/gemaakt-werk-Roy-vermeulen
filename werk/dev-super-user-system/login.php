<?php
    include_once("./db/dbConnect.php");
    session_start();

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $sql = "SELECT * from `users` WHERE `email` = '$email' AND `pass` = '$pass'";
    $result = mysqli_query($conn, $sql);
    $record = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) === 1){
        echo "Successful login";

        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        // We are giving with the user info
            $_SESSION["email"] = $record["email"];
            $_SESSION["firstname"] = $data["firstname"];
            $_SESSION["lastname"] = $data["lastname"];
            $_SESSION["UserRoll"] = $data["UserRoll"];

        // Depending on the user rol he or she will be send to their page
        switch ($record["UserRoll"]) {
            case "student":
                header("Refresh: 0; ./student.php");
            break;
            
            case "financial-admin":
                header("Refresh: 0; ./financial-admin.php");
            break;
            
            case "super-user":
                header("Refresh: 0; ./super-user.php");
            break;
            
            case "warehouse-admin":
                header("Refresh: 0; ./warehouse-admin.php");
            break;

            default;
                header("Refresh: 0; ./index.php");
            break;
        }
        // header("Refresh: 0; ./test.php");
    } else {
        // if email, password or both fails
        $message = "Your credentials are not correct.";
        echo $message;
        header("Refresh: 0; ./index.php");
    }
?>