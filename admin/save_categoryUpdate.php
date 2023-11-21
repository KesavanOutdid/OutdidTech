<?php 
 session_start();
include 'db_conn.php';

if(isset($_POST['category-update'])){
  $id=$_POST['id'];
  $main_title=$_POST['main_title'];
  $sub_title=$_POST['sub_title'];
  $category_id=$_POST['category_id'];

  $sql="UPDATE `categorys` SET main_title='$main_title',  sub_title='$sub_title', category_id='$category_id' WHERE id='".$id."'";
  $result=mysqli_query($conn,$sql);
  if($result){
    //echo "Data updated successfully";
    header('location:category.html');
  }
  else{
    die(mysqli_error($conn));
  }
}