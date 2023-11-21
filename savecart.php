<!DOCTYPE html>
<html>
<body>
<?php

if (isset($_GET['name'])) {

    $name= $_GET['name'];
    $email= $_GET['email'];
    $price= $_GET['price'];
    $product_qty= $_GET['product_qty'];
    $img = $_GET['img'];
    $qty= $_GET['qty'];
   
}

include 'db_conn.php';

$productTotal = $product_qty - $qty;

$sql="INSERT INTO `cart` (name,email,price,total_p_qty,img,quantity) VALUES ('".$name."','".$email."','".$price."','".$productTotal."','".$img."','".$qty."')";
$conn->query($sql);

// Quantity update in product table
$sqls="UPDATE `product` SET product_qty = '".$productTotal."', select_show = '".$productTotal."' WHERE name = '".$name."'";
$conn->query($sqls);

// echo $productTotal;
?>
</body>
</html>