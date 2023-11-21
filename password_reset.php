<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'vendor/autoload.php';

if(isset($_POST['forgotpass_user']) || $_POST['email'])
{
  $conn = mysqli_connect("localhost", "root", "", "outdidtech_electronics");

    $emailId = $_POST['email'];
 
    $result = mysqli_query($conn,"SELECT * FROM user_list WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );

     date_default_timezone_set('Asia/Kolkata');
    $expDate = date("Y-m-d H:i:s ",$expFormat);
 
    $update = mysqli_query($conn,"UPDATE user_list set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 
    $link = "<a href='http://localhost/outdidtech/password-change.php?key=".$emailId."&amp;token=".$token."'>Click To Reset password link?</a>";
 
   // require_once('phpmail/PHPMailerAutoload.php');
 
   $mail = new PHPMailer(true);

    $mail->isSMTP();                                           
    $mail->Host       = 'smtppro.zoho.in';                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'vivek@outdidtech.com';                
    $mail->Password   = 'vivek30091998.';                       
    $mail->SMTPSecure = 'ssl';                             
    $mail->Port       = 465; 
    $mail->setFrom('vivek@outdidtech.com', 'Outdid Tech');          
    $mail->addAddress($emailId);
    $mail->isHTML(true);  
    $mail->Email   = $emailId;                               
    $mail->Subject = 'Reset Password';
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';    $mail->send();
    if($mail->Send())
    {
      ?>
          <script type="text/javascript">
            alert("Link sent to given mail id.");
            window.location.href = "login.html";
          </script>
  
      <?php
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    
    ?>
          <script type="text/javascript">
            alert("Invalid Email Address");
            window.location.href = "login.html";
          </script>
  
      <?php
  }
}
?>