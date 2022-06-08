<?php
//including items that are needed

include("./db/dbConnect.php");
//selection from the database

$slt = $conn->query("SELECT * FROM `cart`");
$slt = $conn->query("SELECT * FROM `orders`");
$slt = $conn->query("SELECT * FROM `users`");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <form action="" method="POST">
    <label for="dog-names">Email:</label>
            <input type="Email" name="Email" placeholder="Email">
            </select>
            <input type="submit" name="submit" value="Submit">
            <br>
    </form>
    <br>
    <a href="orderItems.php"><button> Terug naar bestellen </button></a>
    <br>
    <br>
</body>
</html>
<?php
 //This shows all of the items in the cart
        $qry="SELECT * FROM `cart`";
        $run= $conn->query($qry);
        if($run->num_rows>0){
            while($row=$run->fetch_assoc()){
                $id = $row['id'];
                ?>
                <tr>
                    
                    <td><br>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                    <br><?php echo $row['product_name']?></td> 
                    <td><?php echo $row['qty']?></td>

                    <!--delete order items-->
                    <td>
                        
                        <a href="./deleteCart.php?id=<?php echo $id; ?>">Delete</a>
                </tr>
                
                <?php
            }
        }
        
        
        ?>
        
        