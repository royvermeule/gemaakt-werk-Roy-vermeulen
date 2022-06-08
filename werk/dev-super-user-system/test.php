<?php
//including items that are needed

include("./db/dbConnect.php");
//selection from the database
$slt = $conn->query("SELECT * FROM `test`");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="" method="POST">
    <label for="dog-names">email:</label>
            <input type="email" name="email" placeholder="email">
            </select>
            <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php




        if (isset($_POST['submit'])) {
            $emailTest = $_POST['email'];
            
    
    
            
            
            $query = "INSERT INTO test (emailTest) VALUES ('$emailTest')";
            $run = mysqli_query($conn, $query);
            if($run){
                echo "form submitted";
            }else{
                echo "something went wrong";
            }
        }
?>