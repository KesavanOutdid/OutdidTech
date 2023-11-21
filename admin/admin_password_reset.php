<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

if(isset($_POST['forgotpass_user']) || $_POST['email'])
{
  $conn = mysqli_connect("localhost", "root", "", "outdidtech_electronics");

    $emailId = $_POST['email'];
 
    $result = mysqli_query($conn,"SELECT * FROM admin_user_list WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );

     date_default_timezone_set('Asia/Kolkata');
    $expDate = date("Y-m-d H:i:s ",$expFormat);
 
    $update = mysqli_query($conn,"UPDATE admin_user_list set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 
    $link = "<a href='http://192.168.1.21:9090/outdidtech/admin/change-password.php?key=".$emailId."&amp;token=".$token."'>Click To Reset password link?</a>";
 
   // require_once('phpmail/PHPMailerAutoload.php');
 
    $mail = new PHPMailer();
 
    $mail->CharSet ="utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "kesavankesavan20342@gmail.com";
    // GMAIL password
    $mail->Password = "rlinmxzboaubnbpp";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='kesavankesavan20342@gmail.com';
    $mail->FromName='Kesavan D';
    $mail->AddAddress($emailId,'User');
    $mail->Subject  = 'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      ?>
          <script type="text/javascript">
            alert("Link sent to given mail id.");
            window.location.href = "index.html";
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
            window.location.href = "index.html";
          </script>
  
      <?php
  }
}
?>