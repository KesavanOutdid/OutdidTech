
<?php

include 'db_conn.php';

if (isset($_GET['name'])) {

    $name= $_GET['name'];
}

$sql="SELECT * FROM `product` WHERE name = '".$name."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
                "name" => $row['name'], "price" => $row['price'], "img" => $row['img'], 
                "id" => $row['id'],  "product_qty" => $row['product_qty'], 
        );
}
// encoding array to json format
echo json_encode($output);

?>