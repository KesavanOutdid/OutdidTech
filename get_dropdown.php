<?php

$conn = mysqli_connect("localhost", "root", "", "outdidtech_electronics");

$sql = "SELECT DISTINCT main_title,category_id FROM categorys";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array("main_title" => $row['main_title'],"category_id" => $row['category_id']);
    
}

// encoding array to json format
echo json_encode($output);
