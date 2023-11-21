<?php
 // session_start();

$errors = array();
//connect to db
$conn = mysqli_connect('localhost','root','','outdidtech_electronics') or die("could not connect to database");

 //Checkout USER check
  
$email = mysqli_real_escape_string($conn, $_GET['email']);

 if(count($errors) == 0 ) {
    
    $query = "SELECT * FROM cart WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)) {
      $_SESSION['email'] = $email;
      $_SESSION['success'] ="cart add successfully";
      header('location:checkout.php');
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Your cart is empty ");';
      echo 'window.location.href="cart.html";';
      echo '</script>';
    }
 }
