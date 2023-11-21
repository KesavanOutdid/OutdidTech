<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id=$_GET['id'];
}
$sql="SELECT * FROM `user_list` WHERE id = '".$id."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
        "id" => $row['id'],"name" => $row['name'],"email" => $row['email'],"phone" => $row['phone'],"password" => $row['password']);
}
// encoding array to json format
echo json_encode($output);

?>