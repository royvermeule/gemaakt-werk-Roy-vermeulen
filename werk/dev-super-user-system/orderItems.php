<?php
//including items that are needed

include("./db/dbConnect.php");
//selection from the database
$slt = $conn->query("SELECT * FROM `cart`");
//select for the dropdown menu
$slm = $conn->query("SELECT `product_name` FROM `products`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <form action="./orderItems.php" method="POST">
    <label for="dog-names">Kies een product:</label>
    <select name="product">
        <option selected disabled> select</option>
        <?php
        while($rows=$slm->fetch_assoc()){
            $products = $rows['product_name'];
            echo "<option value='$products'>$products</option>";
        }
        ?>
    </select>
    <label for="dog-names">Kies een aantal:</label>
            <input type="int" name="Aantal" placeholder="Het aantal">
            </select>
            <input type="submit" name="submit" value="Submit">
            <br>
    </form>
    <br>
    <a href="cart.php"><button> karretje </button></a>
    <br>
</body>
</html>

<?php
echo "Dit zijn de producten die je kan bestellen" . "<br>";
$sql = "SELECT * FROM products;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0)
while ($row = mysqli_fetch_assoc($result)){
    echo "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------", "<br>";
    echo $row['product_name'] . "<br>";
    
    echo $row['price'] ,"euro" . "<br>";
    
    echo $row['descr'] . "<br>";
}

//insert into cart
    if (isset($_POST['submit'])) {
        $product_name = $_POST['product'];
        $qty = $_POST['Aantal'];


        $query = "INSERT INTO cart(product_name, qty) VALUES ('$product_name','$qty')";
        $run = mysqli_query($conn, $query);
        if($run){
            echo "in karretje";
        }else{
            echo "er ging wat mis";
        }
        header("Refresh: 0; ./orderItems.php");
    }

    
?>

