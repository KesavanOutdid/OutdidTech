<?php

session_start();
include 'db_conn.php';

if (isset($_POST["query"])) {

        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $sql = " SELECT * FROM product WHERE name REGEXP '" . $search . "' OR price REGEXP '" . $search . "' OR sub_categorys REGEXP '" . $search . "'  OR main_categorys REGEXP '" . $search . "'
        OR part_number REGEXP '" . $search . "' OR sku REGEXP '" . $search . "' OR package REGEXP '" . $search . "' OR des_heading_1 REGEXP '" . $search . "'";
} else{
        $sql = "SELECT * FROM product WHERE select_show ORDER BY RAND()";
       // $sql = "SELECT * FROM product WHERE select_show ORDER BY RAND() LIMIT 8";
}

$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {
        $output[] = array("id" => $row['id'],"name" => $row['name'],"price" => $row['price'],"product_qty" => $row['product_qty'] ,"img" => $row['img'], "select_show" => $row['select_show']);
}
// encoding array to json format
echo json_encode($output);
