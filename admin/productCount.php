<?php

// session_start();
include 'db_conn.php';

// delivery order list count
//$sql = "SELECT * from product";

$sql = "SELECT id from product";

 $result = mysqli_query($conn, $sql);

 $output = array();
 
if ($row = mysqli_fetch_array($result)) {

       $rowcountProduct = mysqli_num_rows( $result);

        $output[] = array("rowcountProduct" => $rowcountProduct);
    
}
 echo  $rowcountProduct;
// encoding array to json format
// echo json_encode($output);
 