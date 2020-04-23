<?php 
require('dbConfig.php');
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role']=='admin'){
        header('Location:admin.php');
    }
    else{
        header('Location:myspace.php');
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'mail/PHPMailer/Exception.php';
require 'mail/PHPMailer/PHPMailer.php';
require 'mail/PHPMailer/SMTP.php';

    if(isset($_POST['submit'])){
        //echo '<pre>';print_r($_POST);die;
        $email = htmlentities($_POST['email']);
        $email_sql = "select email from users where email = '$email'";
        $result = mysqli_query($con,$email_sql);
        if(mysqli_num_rows($result)>0){
            $error = "<p class='text-danger'>Your email is already registered.</p>";
        }
        else{
            $token = bin2hex(random_bytes(16));
            $full_name = htmlentities($_POST['full_name']);
            $role = 'user';
            $date = date('Y-m-d h:i:s');
            $sql = "insert into `users`(email,full_name,role,token,created_at) values ('$email','$full_name','$role','$token','$date')";
            $username 	= "testyounggeeks@gmail.com";
            $pass 		= "young@123";
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug 	= 0;
            $mail->Host 		= 'smtp.gmail.com';
            $mail->SMTPAuth 	= true;
            $mail->Username 	= $username;
            $mail->Password 	= $pass;
            $mail->SMTPSecure 	= 'tls';
            $mail->Port 		= 587;
            $mail->setFrom('admin@demo.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject 		= 'Email Verification.';
            $mailContent 		= "<h1>Please click on below link to verify your account.</h1>
                                    <a href='localhost/bms/password.php?token=$token'>localhost/bms/password.php?token=$token</a>";
            $mail->Body 		= $mailContent;
            
            if (!$mail->send())  {
                echo 'Mailer Error: ' . $mail->ErrorInfo;die;
            }
            if(mysqli_query($con,$sql)){
                $sucess = "<p class='alert alert-success'>Please Verify your email.</p>";
            }
            else{
                $error = "<p class='text-danger'>Error in registration.</p>";
            }
        }
        
    }