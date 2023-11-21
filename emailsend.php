<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'vendor/autoload.php';

if(isset($_POST["send"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $body = '
        <html>
            <body>
                <div>
                    <div>First Name:- '.$fname.'</div>
                    <div>Last Name:- '.$lname.'</div>
                    <div>Email:- '.$email.'</div>
                    <div>phone:- '.$phone.'</div>
                    <div>Subject:- '.$subject.'</div>
                    <div>Message:- '.$message.'</div> 
                </div>
            </body>
        </html>
        ';
    
    $mail = new PHPMailer(true);
    
    //SMTP Settings
    $mail->isSMTP();                                           
    $mail->Host       = 'smtppro.zoho.in';                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'vivek@outdidtech.com';                
    $mail->Password   = 'vivek30091998.';                       
    $mail->SMTPSecure = 'ssl';                             
    $mail->Port       = 465; 

    $mail->setFrom('vivek@outdidtech.com');          
    $mail->addAddress('vivek@outdidtech.com');

    //Email Settings
    $mail->isHTML(true);  
    $mail->Name = $fname&$lname;
    $mail->Email   = $email;                               
    $mail->Subject = $subject;
    $mail->Body = $message&$email&$fname&$lname;
    $mail->send();
   
    echo
    "<script>
    alert('Mail Sent Successfully');
    document.location.href = 'contact-us.html';
    </script>";
}

?>