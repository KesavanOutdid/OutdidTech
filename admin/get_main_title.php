<?php

session_start();
include 'db_conn.php';

$sql = "SELECT DISTINCT main_title FROM categorys";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {
    $output[] = array("main_title" => $row['main_title']);
}

echo json_encode($output);