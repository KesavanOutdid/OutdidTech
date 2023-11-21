<?php 
 session_start();
include 'db_conn.php';

if(isset($_POST['save_bio'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $phone=$_POST['phone'];
  $birthday=$_POST['birthday'];
  // $user_profile=$_POST['user_profile'];
  $address=$_POST['address'];
  $country=$_POST['country'];
  $city=$_POST['city'];
  $pincode=$_POST['pincode'];

  $sql="UPDATE `user_list` SET name = '$name',   password = '$password',
    phone = '$phone', birthday = '$birthday',  address = '$address', country = '$country', 
   city = '$city', pincode = '$pincode' WHERE email = '".$email."'";
  $result=mysqli_query($conn,$sql);
  if($result){
    //echo "Data updated successfully";
    header('location:user-dashboard.html');
  }
  else{
    die(mysqli_error($conn));
  }
} 

if(isset($_FILES["image"]["name"])){
  
   $imageName = $_FILES["image"]["name"];
   $imageSize = $_FILES["image"]["size"];
   $tmpName = $_FILES["image"]["tmp_name"];

   // Image validation
   $validImageExtension = ['jpg', 'jpeg', 'png'];
   $imageExtension = explode('.', $imageName);
   $imageExtension = strtolower(end($imageExtension));
   if (!in_array($imageExtension, $validImageExtension)){
     echo
     "
     <script>
       alert('Invalid Image Extension');
       document.location.href = 'user-dashboard.html';
     </script>
     ";
   }
   elseif ($imageSize > 1200000){
     echo
     "
     <script>
       alert('Image Size Is Too Large');
       document.location.href = 'user-dashboard.html';
     </script>
     ";
   }
   else{
     $user_profile = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
     $user_profile .= '.' . $imageExtension;
     $query = "UPDATE user_list SET user_profile = '$user_profile' WHERE email='".$_SESSION['email']."'";
     mysqli_query($conn, $query);
     move_uploaded_file($tmpName, 'img/' . $user_profile);
     echo
     "
     <script>
     document.location.href = 'user-dashboard.html';
     </script>
     ";
   }
  }
?>