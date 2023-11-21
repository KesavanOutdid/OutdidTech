<?php 
 session_start();
include 'db_conn.php';

if(isset($_POST['update-product'])){
  $name=$_POST['name'];
  $price=$_POST['price'];
  $product_qty=$_POST['product_qty'];
  $select_show=$_POST['select_show'];
  $part_number=$_POST['part_number'];
  $sku=$_POST['sku'];
  $des_heading_1=$_POST['des_heading_1'];
  $des_paragraph_1=$_POST['des_paragraph_1'];
  $des_heading_2=$_POST['des_heading_2'];
  $des_paragraph_2=$_POST['des_paragraph_2'];
  $package=$_POST['package'];
  $specialty=$_POST['specialty'];
  $weight=$_POST['weight'];
  $brand=$_POST['brand'];
  $manufacturer=$_POST['manufacturer'];
  $newimg_01 = $_POST['Newimg_01'];
  $newimg_02 = $_POST['Newimg_02'];
  $newimg_03 = $_POST['Newimg_03'];
  $newimg_04 = $_POST['Newimg_04'];
  $newUser_link = $_POST['NewUser_link'];

// product img save
  if($newimg_01 == "Newimg_01"){
    $img = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../assets/images/" .$img;
    move_uploaded_file($tmp_name, $folder);
  } else 
  {
    $img=$_POST['image'];
  }

  if($newimg_02 == "Newimg_02"){
    $img_2 = $_FILES['img_2']['name'];
    $tmp_name = $_FILES['img_2']['tmp_name'];
    $folder = "../assets/images/" .$img_2;
    move_uploaded_file($tmp_name, $folder);
  }else{
    $img_2=$_POST['img_2'];
  }

  if($newimg_03 == "Newimg_03"){
    $img_3 = $_FILES['img_3']['name'];
    $tmp_name = $_FILES['img_3']['tmp_name'];
    $folder = "../assets/images/" .$img_3;
    move_uploaded_file($tmp_name, $folder);
  }else{
    $img_3=$_POST['img_3'];

  }

  if($newimg_04 == "Newimg_04"){
    $img_4 = $_FILES['img_4']['name'];
    $tmp_name = $_FILES['img_4']['tmp_name'];
    $folder = "../assets/images/" .$img_4;
    move_uploaded_file($tmp_name, $folder);
  }else{
    $img_4=$_POST['img_4'];

  }

  // user_link pdf save
  if($newUser_link == "NewUser_link"){
    $user_link = $_FILES['user_link']['name'];
    $tmp_name = $_FILES['user_link']['tmp_name'];
    $folder = "../assets/images/pdf/" .$user_link;
    move_uploaded_file($tmp_name, $folder);
  }else{
    $user_link=$_POST['user_link'];
  }

  
  $sql="UPDATE `product` SET name='$name',  price='$price', product_qty='$product_qty',select_show='$select_show',  
   part_number='$part_number', sku='$sku', img='$img', img_2='$img_2', img_3='$img_3', img_4='$img_4',
   des_heading_1='$des_heading_1',   des_paragraph_1='$des_paragraph_1', des_heading_2='$des_heading_2',   
   des_paragraph_2='$des_paragraph_2', package='$package', specialty='$specialty', user_link='$user_link',
   weight='$weight', brand='$brand', manufacturer='$manufacturer' WHERE name='".$name."'";
  $result=mysqli_query($conn,$sql);
  if($result){
    //echo "Data updated successfully";
    header('location:products.html');
  }
  else{
    die(mysqli_error($conn));
  }
}
