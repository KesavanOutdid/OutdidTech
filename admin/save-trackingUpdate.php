<?php 
 session_start();
include 'db_conn.php';

if(isset($_POST['tracking-update'])){
 // $email=$_POST['email'];  
  $id=$_POST['id'];
  $tracking_code=$_POST['tracking_code'];
  $estimated_time=$_POST['estimated_time'];
  $confirmed=$_POST['confirmed'];
  $packed=$_POST['packed'];
  $shipped=$_POST['shipped'];
  $arriving=$_POST['arriving'];


  $sql="UPDATE `delivery_address_list` SET tracking_code='$tracking_code', estimated_time='$estimated_time', confirmed='$confirmed',  packed='$packed', shipped='$shipped', arriving='$arriving' WHERE id='".$id."'";
  $result=mysqli_query($conn,$sql);
  if($result){
    //echo "Data updated successfully";
    header('location:order-list.html');
  }
  else{
    die(mysqli_error($conn));
  }
}