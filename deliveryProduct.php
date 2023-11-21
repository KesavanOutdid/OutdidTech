<?php
 session_start();

$name = "";
$email = "";

$errors = array();

//connect to db

$conn = mysqli_connect('localhost','root','','outdidtech_electronics') or die("could not connect to database");

//Register users
// if(isset($_POST['delivery_product'])) {

// $name = mysqli_real_escape_string($conn, $_POST['name']);
// $phone = mysqli_real_escape_string($conn, $_POST['phone']);
// $address = mysqli_real_escape_string($conn, $_POST['address']);
// $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
// $deliveryoption = mysqli_real_escape_string($conn, $_POST['deliveryoption']);
// $paymentoption = mysqli_real_escape_string($conn, $_POST['paymentoption']);

 
// }
//$id = $_POST['id'];

// for ($i = 0; $i < count($id); ++$i) {
// echo  $id[$i];
   $name = $_GET['name'];
   $phone = $_GET['phone'];
   $address = $_GET['address'];
   $pincode = $_GET['pincode'];
   $paymentoption = $_GET['paymentoption'];



   $get_data = "SELECT * FROM cart WHERE email='".$_SESSION['email']."' ";
   $result_data = mysqli_query($conn, $get_data);

   if (mysqli_num_rows($result_data) > 0) {

    while ($row = mysqli_fetch_array($result_data)) {

      $p_name = $row['name'];
      $email = $row['email'];
      $p_img = $row['img'];
      $p_price = $row["price"];
      $p_quantity = $row["quantity"];

      $query ="INSERT INTO delivery_address_list (name, phone, email, address, pincode, paymentoption,p_img,p_name,p_price,p_quantity) VALUES ('$name', '$phone', '$email', '$address', '$pincode', '$paymentoption','$p_img','$p_name','$p_price','$p_quantity')";
      mysqli_query($conn, $query);
      $_SESSION['name'] = $name;
      echo '<script language="javascript">';
      echo 'alert("Your order is success");';
      echo 'window.location.href="orders.html";';
      echo '</script>';
    //  header('location:orders.html');  
     // header('location:stripe_charge.php');                                              

    }
   
}
// echo $p_name;
// }
$delete = "DELETE FROM cart WHERE  email='".$_SESSION['email']."'";
mysqli_query($conn, $delete); 
