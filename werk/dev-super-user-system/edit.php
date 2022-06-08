<?php
include("./db/dbConnect.php");

$slt = $conn->query("SELECT * FROM `users`");
$slm = $conn->query("SELECT `rollName` FROM `roll`");
// check if the right information is send
if(!$conn){
    die('error in db' . mysqli_error($conn));
}
//getting the information to use for the html that we write it to there
else{
    $id = $_GET['id'];
    $qry="SELECT * FROM `users` WHERE `id` = '$id'";
    $run= $conn->query($qry);
    if($run->num_rows>0){
        while($row=$run->fetch_assoc()){
            $email=$row['email'];
            $pass=$row['pass'];
            $firstname=$row['firstname'];
            $infix=$row['infix'];
            $lastname=$row['lastname'];
            $UserRoll=$row['UserRoll'];
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>

</head>
<body>
<form method="post">
    <label>E-mail</label>
    <input type="email" name="email" value="<?php echo $email;?>">
    <br><br>

    <label>Password</label>
    <input type="password" name="pass" value="<?php echo $pass;?>">
    <br><br>

    <label>Firstname</label>
    <input type="text" name="Firstname" value="<?php echo $firstname;?>">
    <br><br>

    <label>Infix</label>
    <input type="text" name="infix" value="<?php echo $infix;?>">
    <br><br>

    <label>Lastname</label>
    <input type="text" name="lastname" value="<?php echo $lastname;?>">
    <br><br>

    <label>Roll</label>
    <select name="roll">
        <option selected disabled> <?php echo $UserRoll;?></option>
        <!--the code so we can look at the rolls-->
        <?php
        while($rows=$slm->fetch_assoc()){
            $roll = $rows['rollName'];
            echo "<option value='$roll'>$roll</option>";
        }
        ?>
    </select>
    <br><br>
    <!--Button-->
    <input type="submit" name="update" value="Update">
</body>
</html>
<?php
//the update script to write it to the database
if(isset($_POST['update'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $firstname=$_POST['Firstname'];
    $infix=$_POST['infix'];
    $lastname=$_POST['lastname'];
    $UserRoll=$_POST['roll'];
    $qry="UPDATE `users` SET `email`='$email', `pass`='$pass', `firstname`='$firstname', `infix`='$infix', `lastname`='$lastname', `UserRoll`='$UserRoll' WHERE `id`=$id";
    //checking fi everything works
    if(mysqli_query($conn, $qry)){
        header('location: ./registerSuperUser.php');
    }else{
        echo mysqli_error($conn);
    }
}
?>