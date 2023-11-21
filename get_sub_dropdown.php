<?php

$conn = mysqli_connect("localhost", "root", "", "outdidtech_electronics");

if (isset($_GET['category_id'])) {

    $category_id= $_GET['category_id'];
}
 
$sql = "SELECT sub_title FROM categorys WHERE category_id = '".$category_id."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {
    $output[] = array("sub_title" => $row['sub_title']);
}

// encoding array to json format
echo json_encode($output);