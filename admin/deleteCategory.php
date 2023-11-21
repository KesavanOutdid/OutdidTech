<!DOCTYPE html>
<html>
<body>
<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id= $_GET['id'];
}

$sql="DELETE FROM `categorys` WHERE id = '".$id."'";
$conn->query($sql);

?>
</body>
</html>