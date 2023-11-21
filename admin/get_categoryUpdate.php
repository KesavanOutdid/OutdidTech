<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id=$_GET['id'];
}
$sql="SELECT * FROM `categorys` WHERE id = '".$id."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
        "id" => $row['id'],"main_title" => $row['main_title'],"sub_title" => $row['sub_title'], "category_id" => $row['category_id']);
}
// encoding array to json format
echo json_encode($output);

?>