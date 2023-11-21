<!DOCTYPE html>
<html>
<body>
<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id= $_GET['id'];
}

$sql="DELETE FROM `product` WHERE id = '".$id."'";
$conn->query($sql);

?>
</body>
</html>