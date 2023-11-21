
<?php
 session_start();

include 'db_conn.php';

if (isset($_GET['name'])) {

    $name= $_GET['name'];
}

$sql="SELECT * FROM `cart` WHERE name = '".$name."' AND email='".$_SESSION['email']."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
                "name" => $row['name'], "price" => $row['price'], "total_p_qty" => $row['total_p_qty'], "img" => $row['img'],"quantity" => $row['quantity']
        );
}
// encoding array to json format
echo json_encode($output);

?>