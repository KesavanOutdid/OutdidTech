<!DOCTYPE html>
<html>
<body>
<?php

include 'db_conn.php';

if (isset($_GET['name'])) {

    $name= $_GET['name'];
    $total_p_qty= $_GET['total_p_qty'];
    $quantity= $_GET['quantity'];
}

$productAddTotal = $total_p_qty + $quantity;

$sql="DELETE FROM `cart` WHERE name = '".$name."'";
$conn->query($sql);

// Quantity update in product table
$sqls="UPDATE `product` SET product_qty = '".$productAddTotal."', select_show = '".$productAddTotal."' WHERE name = '".$name."'";
$conn->query($sqls);

?>
</body>
</html>