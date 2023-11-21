<?php

session_start();
include 'db_conn.php';

$main_categorys = TRIM($_POST['main_categorys']);
$main_categorys = mysqli_real_escape_string($conn, $main_categorys);
$sub_categorys = TRIM($_POST['sub_categorys']);
$sub_categorys = mysqli_real_escape_string($conn, $sub_categorys);
$name = TRIM($_POST['name']);
$name = mysqli_real_escape_string($conn, $name);
$price = TRIM($_POST['price']);
$price = mysqli_real_escape_string($conn, $price);
$product_qty = TRIM($_POST['product_qty']);
$product_qty = mysqli_real_escape_string($conn, $product_qty);
$part_number = TRIM($_POST['part_number']);
$part_number = mysqli_real_escape_string($conn, $part_number);
$sku = TRIM($_POST['sku']);
$sku = mysqli_real_escape_string($conn, $sku);
$des_heading_1 = TRIM($_POST['des_heading_1']);
$des_heading_1 = mysqli_real_escape_string($conn, $des_heading_1);
$des_paragraph_1 = TRIM($_POST['des_paragraph_1']);
$des_paragraph_1 = mysqli_real_escape_string($conn, $des_paragraph_1);
$des_heading_2 = TRIM($_POST['des_heading_2']);
$des_heading_2 = mysqli_real_escape_string($conn, $des_heading_2);
$des_paragraph_2 = TRIM($_POST['des_paragraph_2']);
$des_paragraph_2 = mysqli_real_escape_string($conn, $des_paragraph_2);
// $user_link = TRIM($_POST['user_link']);
// $user_link = mysqli_real_escape_string($conn, $user_link);
$package = TRIM($_POST['package']);
$package = mysqli_real_escape_string($conn, $package);
$specialty = TRIM($_POST['specialty']);
$specialty = mysqli_real_escape_string($conn, $specialty);
$weight = TRIM($_POST['weight']);
$weight = mysqli_real_escape_string($conn, $weight);
$brand = TRIM($_POST['brand']);
$brand = mysqli_real_escape_string($conn, $brand);
$manufacturer = TRIM($_POST['manufacturer']);
$manufacturer = mysqli_real_escape_string($conn, $manufacturer);
// $img = TRIM($_POST['image']);
// $img = mysqli_real_escape_string($conn, $img);

$check = mysqli_query($conn, "SELECT * FROM product where name = '$name' AND part_number = '$part_number' AND sku = '$sku' ");
$checkuser = mysqli_num_rows($check);

// product img save
$img = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$folder = "../assets/images/" .$img;
move_uploaded_file($tmp_name, $folder);

$img_2 = $_FILES['img_2']['name'];
$tmp_name = $_FILES['img_2']['tmp_name'];
$folder = "../assets/images/" .$img_2;
move_uploaded_file($tmp_name, $folder);

$img_3 = $_FILES['img_3']['name'];
$tmp_name = $_FILES['img_3']['tmp_name'];
$folder = "../assets/images/" .$img_3;
move_uploaded_file($tmp_name, $folder);

$img_4 = $_FILES['img_4']['name'];
$tmp_name = $_FILES['img_4']['tmp_name'];
$folder = "../assets/images/" .$img_4;
move_uploaded_file($tmp_name, $folder);

// user_link pdf save
$user_link = $_FILES['user_link']['name'];
$tmp_name = $_FILES['user_link']['tmp_name'];
$folder = "../assets/images/pdf/" .$user_link;
move_uploaded_file($tmp_name, $folder);


if ($checkuser == 0) {

    $insert = "INSERT INTO `product` (main_categorys,sub_categorys,name,price,product_qty,part_number,sku,des_heading_1,des_paragraph_1,des_heading_2,des_paragraph_2,package,specialty,weight,brand,manufacturer,img,img_2,img_3,img_4,user_link) 
                   VALUES ('" . $main_categorys . "','" . $sub_categorys . "','" . $name . "','" . $price . "','".$product_qty."','" . $part_number . "','" . $sku . "','" . $des_heading_1 . "','" . $des_paragraph_1 . "','" . $des_heading_2 . "','" . $des_paragraph_2 . "','". $package ."',
                   '". $specialty ."','". $weight ."','". $brand ."','". $manufacturer ."','".$img."','".$img_2."','".$img_3."','".$img_4."','".$user_link."')";

} else {
?>
    <script type="text/javascript">
        alert("Component Already Exist.");
        window.location.href = "products.html";
    </script>
<?php
}


if ($conn->query($insert) === TRUE) {
?>
    <script type="text/javascript">
        alert("New Component Added Successfully.");
        window.location.href = "products.html";
    </script>
<?php
} else {

    echo "Error:" . $insert . "<br>" . $conn->error;

    $conn->close();
}








