<?php

session_start();
include 'db_conn.php';

if (isset($_POST["sub"])) {

    $sub = $_POST["sub"];
}

$sql = "SELECT sub_title FROM categorys WHERE main_title = '$sub'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {
    $output[] = array("sub_title" => $row['sub_title']);
}

echo json_encode($output);