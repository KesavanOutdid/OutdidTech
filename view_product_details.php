
<?php

include 'db_conn.php';

if (isset($_GET['id'])) {

    $id= $_GET['id'];
}

$sql="SELECT * FROM `product` WHERE id = '".$id."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
                "name" => $row['name'], "price" => $row['price'], "img" => $row['img'], "img_2" => $row['img_2'], 
                "img_3" => $row['img_3'], "img_4" => $row['img_4'],  "part_number" => $row['part_number'],  "sku" => $row['sku'],
                "id" => $row['id'], "main_categorys" => $row['main_categorys'], "sub_categorys" => $row['sub_categorys'], 
                "des_heading_1" => $row['des_heading_1'], "des_heading_2" => $row['des_heading_2'],
                "des_paragraph_1" => $row['des_paragraph_1'], "des_paragraph_2" => $row['des_paragraph_2'],
                "user_link" => $row['user_link'], "package" => $row['package'], "specialty" => $row['specialty'], 
                "weight" => $row['weight'],"brand" => $row['brand'],"manufacturer" => $row['manufacturer'],
                "product_qty" => $row['product_qty'],"product_qty" => $row['product_qty'],

        );
}
// encoding array to json format
echo json_encode($output);

?>