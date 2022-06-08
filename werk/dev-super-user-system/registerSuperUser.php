<?php
//including items that are needed

include("./db/dbConnect.php");
//selection from the database
$slt = $conn->query("SELECT * FROM `users`");
$slm = $conn->query("SELECT `rollName` FROM `roll`");
?>
<!doctype html>
<html lang="en">
<head>

</head>
<body>
<form method="post">
    <label>E-mail</label>
    <input type="email" name="email" placeholder="Type E-mail">
    <br><br>

    <label>Password</label>
    <input type="password" name="pass" placeholder="Type password">
    <br><br>

    <label>Firstname</label>
    <input type="text" name="Firstname" placeholder="Type firstname">
    <br><br>

    <label>Infix</label>
    <input type="text" name="infix" placeholder="Type infix">
    <br><br>

    <label>Lastname</label>
    <input type="text" name="lastname" placeholder="Type lastname">
    <br><br>

    <label>Roll</label>
    <select name="roll">
        <option selected disabled> select</option>
        <?php
        while($rows=$slm->fetch_assoc()){
            $roll = $rows['rollName'];
            echo "<option value='$roll'>$roll</option>";
        }
        ?>
    </select>
    <br><br>
    <!--Button-->
    <input type="submit" name="submit" value="Submit">

    <!--The read from the database-->
    <h3>Results List</h3>
    <table style="width: 80%" border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>roll</th>
        </tr>
        <!--select the rows so the information can be shown in a read-->
        <?php
        $qry="SELECT * FROM `users`";
        $run= $conn->query($qry);
        if($run->num_rows>0){
            while($row=$run->fetch_assoc()){
                $id = $row['id'];
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['firstname']?></td>
                    <td><?php echo $row['infix']?></td>
                    <td><?php echo $row['lastname']?></td>
                    <td><?php echo $row['UserRoll']?></td>
                    <!--edit and deletion of the items-->
                    <td>
                        <a href="./edit.php?id=<?php echo $id; ?>">Edit</a>
                        <a href="./delete.php?id=<?php echo $id; ?>">Delete</a>
                </tr>
                <?php
            }
        }
        ?>



</body>
</html>
<?php
//insert into database
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password=$_POST['pass'];
    $firstName = $_POST['Firstname'];
    $infix = $_POST['infix'];
    $lastName = $_POST['lastname'];
    $rolls = $_POST['roll'];
    $qry = "INSERT INTO users values(null, '$email','$password', '$firstName', '$infix', '$lastName', '$rolls')";
//checking for the connection
    if(mysqli_query($conn, $qry)){
        header("Refresh: 0; ./registerSuperUser.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>