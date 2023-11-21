<?php

session_start();
include 'db_conn.php';

if (isset($_POST["query"])) {

        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $sql = " SELECT * FROM categorys WHERE name REGEXP '" . $search . "' OR main_title REGEXP '" . $search . "'";
} else{
        $sql = "SELECT * FROM categorys";
}

$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array("id" => $row['id'],"category_id" => $row['category_id'],"main_title" => $row['main_title'],"sub_title" => $row['sub_title']);
    
}
// encoding array to json format
echo json_encode($output);
