<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id=$_GET['id'];
}
$sql="SELECT * FROM `delivery_address_list` WHERE id = '".$id."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
        "id" => $row['id'],"email" => $row['email'],"tracking_code" => $row['tracking_code'],"estimated_time" => $row['estimated_time'],"confirmed" => $row['confirmed'],"packed" => $row['packed'],"shipped" => $row['shipped'],"arriving" => $row['arriving']);
}
// encoding array to json format
echo json_encode($output);

?>