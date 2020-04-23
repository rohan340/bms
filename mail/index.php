<?php
	
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		// Include PHPMailer library files
		require 'PHPMailer/Exception.php';
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
		
	if(isset($_POST['submit'])) {
		
		$email 		= $_POST['email'];
		$name 		= $_POST['name'];
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
		$mail->setFrom($email);
		$mail->addAddress('rohan.negi.788@gmail.com');
		$mail->isHTML(true);
		$mail->Subject 		= 'PHPMailer SMTP message';
        $mailContent 		= "<h1>From :".$email."</h1><h4>Send HTML Email using SMTP in Php</h4><p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body 		= $mailContent;
		
		if (!$mail->send())  {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message sent!';
		}
	}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Send e-mail to someone@example.com:</h2>

<form action="" method="post" >
	Name:<br>
	<input type="text" name="name"><br>
	E-mail:<br>
	<input type="text" name="email"><br>
	Message:<br>
	<input type="text" name="comment" size="50"><br><br>
	<input type="submit" name="submit" value="Send">
	<input type="reset" value="Reset">
</form>
</body>
</html>
