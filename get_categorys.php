<?php
session_start();
include 'db_conn.php';

$sql = "SELECT * FROM categorys";

$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array("id" => $row['id'],"main_title" => $row['main_title'],"sub_title" => $row['sub_title']);
    
}
// encoding array to json format
echo json_encode($output);
