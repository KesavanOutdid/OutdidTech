<?php

session_start();
include 'db_conn.php';

$main_title = TRIM($_POST['main_title']);
$main_title = mysqli_real_escape_string($conn, $main_title);
$sub_title = TRIM($_POST['sub_title']);
$sub_title = mysqli_real_escape_string($conn, $sub_title);
$category_id = TRIM($_POST['category_id']);
$category_id = mysqli_real_escape_string($conn, $category_id);

$check = mysqli_query($conn, "SELECT * FROM categorys where main_title = '$main_title' AND sub_title = '$sub_title'");
$checkuser = mysqli_num_rows($check);

if ($checkuser == 0) {
    $insert = "INSERT INTO `categorys` (main_title,sub_title,category_id) VALUES ('" . $main_title . "', '" . $sub_title . "', '" . $category_id . "')";
} else {
?>
    <script type="text/javascript">
        alert("Categorys Already Exist.");
        window.location.href = "category.html";
    </script>
<?php
}


if ($conn->query($insert) === TRUE) {
?>
    <script type="text/javascript">
        alert("New Categorys Added Successfully.");
        window.location.href = "category.html";
    </script>
<?php
} else {

    echo "Error:" . $insert . "<br>" . $conn->error;

    $conn->close();
}








