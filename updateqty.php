<!DOCTYPE html>
<html>
<body>
<?php

include 'db_conn.php';

if (isset($_GET['name'])) {

    $qty= $_GET['qty'];
    $name= $_GET['name'];
    $total_p_qty= $_GET['total_p_qty'];
    $Minusquantity= $_GET['Minusquantity'];
    $Plusquantity= $_GET['Plusquantity'];

}
if(isset($Minusquantity)){
    $productTotalAdd = $total_p_qty + 1;
} else{
    $productTotalAdd = $total_p_qty - 1;
}

$sql="UPDATE `cart` SET quantity = '".$qty."'  WHERE name = '".$name."'";
$conn->query($sql);

$sqls="UPDATE `cart` SET total_p_qty = '".$productTotalAdd."'  WHERE name = '".$name."'";
$conn->query($sqls);

$sqls1="UPDATE `product` SET product_qty = '".$productTotalAdd."' , select_show = '".$productTotalAdd."'  WHERE name = '".$name."'";
$conn->query($sqls1);

?>
</body>
</html>