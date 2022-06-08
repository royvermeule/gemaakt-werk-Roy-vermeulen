<?php
include("./db/dbConnect.php");

$slt = $conn->query("SELECT * FROM `products`");

// check if the right information is send
if(!$conn){
    die('error in db' . mysqli_error($conn));
}
//getting the information to use for the html that we write it to there
else{
    $id = $_GET['id'];
    $qry="SELECT * FROM `products` WHERE `id` = '$id'";
    $run= $conn->query($qry);
    if($run->num_rows>0){
        while($row=$run->fetch_assoc()){
            $product_name=$row['product_name'];
            $price=$row['price'];
            $descr=$row['descr'];

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
    <input type="text" name="product" value="<?php echo $product_name;?>">
    <br><br>

    <label>Password</label>
    <input type="number" name="price" value="<?php echo $price;?>">
    <br><br>

    <label>Firstname</label>
    <input type="text" name="beschrijving" value="<?php echo $descr;?>">
    <br><br>





    <br><br>
    <!--Button-->
    <input type="submit" name="update" value="Update">
</body>
</html>
<?php
//the update script to write it to the database
if(isset($_POST['update'])){
    $product_name=$_POST['product'];
    $price=$_POST['price'];
    $descr=$_POST['beschrijving'];

    $qry="UPDATE `products` SET `product_name`='$product_name', `price`='$price', `descr`='$descr' WHERE `id`=$id";
    //checking fi everything works
    if(mysqli_query($conn, $qry)){
        header('location: ./warehous-items-manager.php');
    }else{
        echo mysqli_error($conn);
    }
}
?>