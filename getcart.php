
<?php
session_start();

include 'db_conn.php';

$sql="SELECT * FROM `cart` WHERE  email='".$_SESSION['email']."'";    // $sql="SELECT * FROM `cart` WHERE  email='".$_SESSION['email']."'";  
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

    $total = (int)$row['price'] * (int)$row['quantity'];

        $output[] = array(
                "name" => $row['name'], "price" => $row['price'],"total_p_qty" => $row['total_p_qty'], "img" => $row['img'], "quantity" => $row['quantity'], 
                "qty_price_total" => $row['qty_price_total'],"id"=>$row['id'], "total" => $total
        );
}
// encoding array to json format
echo json_encode($output);
?>