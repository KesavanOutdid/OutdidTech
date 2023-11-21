<?php 
 session_start();
include 'db_conn.php';

if(isset($_POST['user-update'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];


  $sql="UPDATE `user_list` SET name='$name',  email='$email', phone='$phone', password='$password' WHERE email='".$email."'";
  $result=mysqli_query($conn,$sql);
  if($result){
    //echo "Data updated successfully";
    header('location:all-users.html');
  }
  else{
    die(mysqli_error($conn));
  }
}