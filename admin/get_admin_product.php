<?php

session_start();
include 'db_conn.php';

if (isset($_POST["query"])) {

        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $sql = " SELECT * FROM product WHERE name REGEXP '" . $search . "' OR price REGEXP '" . $search . "'";
} else{
        $sql = "SELECT * FROM product";

      //  $sqls = "SELECT * from product";
}

$result = mysqli_query($conn, $sql);
// $results = mysqli_query($conn, $sqls);
$output = array();

while ($row = mysqli_fetch_array($result)) {

        $total = (int)$row['id'];
      //  $rowcount = mysqli_num_rows( $results );

        $output[] = array("id" => $row['id'],"name" => $row['name'],"price" => $row['price'],"img" => $row['img'],"select_show" => $row['select_show'],  
        "product_qty" => $row['product_qty'], "part_number" => $row['part_number'], "sku" => $row['sku'], "img_2" => $row['img_2'],
        "img_3" => $row['img_3'],  "img_4" => $row['img_4'],  "des_heading_1" => $row['des_heading_1'], "des_paragraph_1" => $row['des_paragraph_1'], 
        "des_heading_2" => $row['des_heading_2'], "des_paragraph_2" => $row['des_paragraph_2'], "user_link" => $row['user_link'],
        "package" => $row['package'],  "specialty" => $row['specialty'], "weight" => $row['weight'], "brand" => $row['brand'],
        "manufacturer" => $row['manufacturer'], "total" => $total);
    
}
// echo  $rowcount;
// encoding array to json format
echo json_encode($output);
