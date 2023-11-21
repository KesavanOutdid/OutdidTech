<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id=$_GET['id'];
}
$sql="SELECT * FROM `product` WHERE id = '".$id."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
        "id" => $row['id'],"name" => $row['name'],"price" => $row['price'],"img" => $row['img'],  "product_qty" => $row['product_qty'],
        "select_show" => $row['select_show'], "part_number" => $row['part_number'], "sku" => $row['sku'], "img_2" => $row['img_2'],
        "main_categorys" => $row['main_categorys'], "sub_categorys" => $row['sub_categorys'], 
        "img_3" => $row['img_3'],  "img_4" => $row['img_4'],  "des_heading_1" => $row['des_heading_1'], "des_paragraph_1" => $row['des_paragraph_1'], 
        "des_heading_2" => $row['des_heading_2'], "des_paragraph_2" => $row['des_paragraph_2'], "user_link" => $row['user_link'],
        "package" => $row['package'],  "specialty" => $row['specialty'], "weight" => $row['weight'], "brand" => $row['brand'], "manufacturer" => $row['manufacturer']);
}
// encoding array to json format
echo json_encode($output);
// echo $product_qty;
?>