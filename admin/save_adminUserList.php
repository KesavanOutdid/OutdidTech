<?php 
 session_start();
include 'db_conn.php';

if(isset($_POST['admin-user-list-update'])){
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];

    // admin profile save
    // $admin_profile = $_FILES['admin_profile']['name'];
    // $tmp_name = $_FILES['admin_profile']['tmp_name'];
    // $folder = "assets/images/admin-profile/" .$admin_profile;
    // move_uploaded_file($tmp_name, $folder);
    
  $sql="UPDATE `admin_user_list` SET name='$name',  phone='$phone', email='$email', password='$password' WHERE name='".$name."'";

  $result=mysqli_query($conn,$sql);
  if($result){
    //echo "Data updated successfully";
    header('location:profile-setting.html');
  }
  else{
    die(mysqli_error($conn));
  }
}


if(isset($_FILES["admin_profile"]["name"])){
  
    $imageName = $_FILES["admin_profile"]["name"];
    $imageSize = $_FILES["admin_profile"]["size"];
    $tmpName = $_FILES["admin_profile"]["tmp_name"];
 
    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)){
      echo
      "
      <script>
        alert('Invalid Image Extension');
        document.location.href = 'profile-setting.html';
      </script>
      ";
    }
    elseif ($imageSize > 1200000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
        document.location.href = 'profile-setting.html';
      </script>
      ";
    }
    else{
      $admin_profile = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
      $admin_profile .= '.' . $imageExtension;
      $query = "UPDATE admin_user_list SET admin_profile = '$admin_profile' WHERE email='".$_SESSION['email']."'";
      mysqli_query($conn, $query);
      move_uploaded_file($tmpName, 'assets/images/admin-profile/' . $admin_profile);
      echo
      "
      <script>
      document.location.href = 'profile-setting.html';
      </script>
      ";
    }
   }