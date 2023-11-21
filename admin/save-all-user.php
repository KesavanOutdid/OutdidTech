<?php

session_start();
include 'db_conn.php';

if(isset($_POST['save-user'])) {

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);

 if(empty($name)) {
    array_push($errors, "Name is required");
 }
 if(empty($email)) {
    array_push($errors, "Email is required");
 }
 if(empty($password_1)) {
    array_push($errors, "Password is required");
 }

 $user_check_query = "SELECT * FROM user_list WHERE email = '$email' LIMIT 1";
 $results = mysqli_query($conn, $user_check_query);
 $user = mysqli_fetch_assoc($results);

 if($user) {

   echo '<script language="javascript">';
   echo 'alert("Name or email is already exists... Please check...")';
   echo '</script>';
 }

 else{
   //  $password = md5($password_1); //this will encrypt the password
   $password = $password_1; //this will not encrypt the password
    $query ="INSERT INTO user_list (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($conn, $query);
    $_SESSION['name'] = $name;
    $_SESSION['success'] = "You are now logged in";
    header('location:all-users.html');
 }
}







