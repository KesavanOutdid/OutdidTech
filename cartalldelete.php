<!DOCTYPE html>
<html>
<body>
<?php

include 'db_conn.php';

$sql="DELETE FROM `cart`";
$conn->query($sql);

?>
</body>
</html>