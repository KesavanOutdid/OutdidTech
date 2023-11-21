<?php

session_start();
include 'db_conn.php';

if (isset($_POST["query"])) {

        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $sql = " SELECT * FROM user_list WHERE name REGEXP '" . $search . "' OR email REGEXP '" . $search . "'";
} else{
        $sql = "SELECT * FROM user_list";
}

$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array("id" => $row['id'],"name" => $row['name'],"email" => $row['email'],
        "phone" => $row['phone'],  "password" => $row['password'],  "user_profile" => $row['user_profile']);
        
}
// encoding array to json format
echo json_encode($output);
