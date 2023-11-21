<?php
session_start();

include 'db_conn.php';

// if (isset($_GET['id'])) {

//     $id=$_GET['id'];
// }
$sql="SELECT * FROM `admin_user_list` WHERE email='".$_SESSION['email']."'";
$result = mysqli_query($conn, $sql);

$output = array();
// echo $_SESSION['email'];
while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
        "id" => $row['id'],"name" => $row['name'],"email" => $row['email'],"password" => $row['password'], 
        "phone" => $row['phone'], "admin_profile" => $row['admin_profile']);
}
// encoding array to json format
echo json_encode($output);

?>