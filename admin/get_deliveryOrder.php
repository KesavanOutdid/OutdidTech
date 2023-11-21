<?php

session_start();
include 'db_conn.php';

if (isset($_POST["query"])) {

        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $sql = " SELECT * FROM delivery_address_list WHERE name REGEXP '" . $search . "' OR email REGEXP '" . $search . "'";
} else{
        $sql = "SELECT * FROM delivery_address_list ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);

$output = array();


while ($row = mysqli_fetch_array($result)) {

        $total = (int)$row['p_price'] * (int)$row['p_quantity'];

        $output[] = array("id" => $row['id'],"name" => $row['name'],"email" => $row['email'],"phone" => $row['phone'], 
         "address" => $row['address'],  "pincode" => $row['pincode'],"deliveryoption" => $row['deliveryoption'],"paymentoption" => $row['paymentoption'],
         "p_img" => $row['p_img'],"p_name" => $row['p_name'],"p_price" => $row['p_price'],"p_quantity" => $row['p_quantity'], "total" => $total);
        
}
// encoding array to json format
echo json_encode($output);
