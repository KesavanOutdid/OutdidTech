<?php
session_start();

$name = "";
$email = "";

$errors = array();

//connect to db

$conn = mysqli_connect('localhost','root','','outdidtech_electronics') or die("could not connect to database");

//Register users

if(isset($_POST['reg_user'])) {

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
    header('location:login.html');
 }
}

 //LOGIN USER

 if(isset($_POST['login_user'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password =  mysqli_real_escape_string($conn, $_POST['password_1']);

  if(empty($email)) {

    array_push($errors, "Email is required");
  }
  if(empty($password)) {

    array_push($errors, "Password is required");
  }

 if(count($errors) == 0 ) {

   //  $password = md5($password); //this will encrypt the password
   $password = $password; //this will not encrypt the password

    $query = "SELECT * FROM user_list WHERE email = '$email' AND password ='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)) {
      $_SESSION['email'] = $email;
      echo '<script language="javascript">';
      echo 'sessionStorage.setItem("email", "'.$email.'");';
    // echo 'alert("sessionStorage.setItem("name", "'.$name.'"));';
      echo 'window.location.href="index.html";';
      echo '</script>';
    // header("Location: user-dashboard.html?email=$email");
      die();
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Wrong username/password combination, Please try again.");';
      echo 'window.location.href="login.html";';
      echo '</script>';
    }
 }
}

