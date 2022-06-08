<?php
include("./db/dbConnect.php");
//selects the query we are gonna use
    $slt = $conn->query("SELECT * FROM `products`");

    
?>
<link rel="stylesheet" href="./css/Roy/style.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
</head>
<body>
    <form action="./warehous-items-manager.php" method="POST">
    <label for="dog-names">Product naam:</label>
            <input type="text" name="product" placeholder="product">
            </select>
            <label for="dog-names">prijs:</label>
            <input type="number" name="price" placeholder="prijs">
            </select>
            <label for="dog-names">beschijving:</label>
            <input type="text" name="beschrijving" placeholder="beschrijving">
            </select>
            <input type="submit" name="submit" value="Submit">
            <br>
    </form>
    </form>
    <header1>
        Hier staan alle producten.
    </header1>
</body>
</html>
<br>
<?php
    //for insertion of new products, into the database

    //sets value of the names
    if (isset($_POST['submit'])) {
        $product_name = $_POST['product'];
        $price = $_POST['price'];
        $descr = $_POST['beschrijving'];

        //inserts values
        $query = "INSERT INTO products(product_name, price, descr) VALUES ('$product_name','$price', '$descr')";
        $run = mysqli_query($conn, $query);

        //checks if it runs the db
        if($run){
            echo "updated";
        }else{
            echo "er ging wat mis";
        }
        header("Refresh: 2; ./warehous-items-manager.php");
    }
    //this lists all of the products in the database
            $qry="SELECT * FROM `products`";
            $run= $conn->query($qry);
            if($run->num_rows>0){
                while($row=$run->fetch_assoc()){
                    $id = $row['id'];
                    ?>
                    <tr>
                        <form2 action="">
                        <td><br>
                        ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                        <br><?php echo $row['product_name']?></td>
                        <td><br><?php echo $row['price']?></td>
                        <td><br><br><?php echo $row['descr']?></td>
    
                        <!--this section is for deletion of the items-->
                        <td>
                            <a href="./editProduct.php?id=<?php echo $id; ?>">Edit</a>
                            <a href="./deleteProduct.php?id=<?php echo $id; ?>">Delete</a>
                            </form2>
                    </tr>
                    
                    <?php
                }
            }

?>