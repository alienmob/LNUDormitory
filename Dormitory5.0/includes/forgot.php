<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require '../vendor/autoload.php';

 include('conn.php');
 session_start();

 require_once 'config.php';

 if(ISSET($_POST['forgot'])){
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);

  if(!$email){
   $_SESSION['email_error'] = 'Your email address is invalid';
  }
  else
  {
   $sql = "SELECT * FROM `students` WHERE email = '".$email."'";
   $query = $conn->query($sql);
   if($query->num_rows < 1){
    $_SESSION['email_error'] = 'Email does not exist in the database.';
   }
   else {
     $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
     $expDate = date("Y-m-d H:i:s",$expFormat);
     $token = md5(2418 * 2);
     $addtoken = substr(md5(uniqid(rand(),1)),3,10);
     $token = $token . $addtoken;

     $sql_insert = "INSERT INTO `password_reset` (`email`, `token`, `expDate`)
     VALUES ('" .$email. "', '" .$token. "', '" .$expDate. "')";
     
     if ($conn->query($sql_insert)) {
      $output='<p>Dear user,</p>';
      $output.='<p>Please click on the following link to reset your password.</p>';
      $output.='<p><a href="http://localhost/Dormitory5.0/reset-password.php?token='.$token.'&email='.$email.'&action=reset" target="_blank">
      http://localhost/Dormitory5.0/reset-password.php
      ?token='.$token.'&email='.$email.'&action=reset</a></p>';		
      $output.='<p>Please be sure to copy the entire link into your browser.
      The link will expire after 1 day for security reason.</p>';
      $output.='<p>If you did not request this forgotten password email, no action 
      is needed, your password will not be reset. However, you may want to log into 
      your account and change your security password as someone may have guessed it.</p>';   	
      $output.='<p>Thanks,</p>';
      $output.='<p>System Administrator</p>';
      $body = $output; 
     
      $phpmailer = new PHPMailer(true);
      try {
        // $phpmailer->isSMTP();
        // $phpmailer->Host = 'smtp.mailtrap.io';
        // $phpmailer->SMTPAuth = true;
        // $phpmailer->Port = 2525;
        // $phpmailer->Username = '4409643b784de2';
        // $phpmailer->Password = 'd1b16df0cff195';


        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Username = Database::USERNAME;
        $phpmailer->Password = Database::PASSWORD;
        $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $phpmailer->Port = 587;

      
        //Recipients
       $phpmailer->setFrom('lnustudentdorm2021@gmail.com', 'LNU Student Dormitory');
       $phpmailer->addAddress($email);     //Add a recipient
       $phpmailer->addReplyTo('lnustudentdorm2021@gmail.com', 'Information');
      
         //Content
       $phpmailer->isHTML(true);                                  //Set email format to HTML
       $phpmailer->Subject = 'Password Recovery Request';
       $phpmailer->Body    = $body;

       $phpmailer->send();
       
       echo 'Message has been sent';
       $_SESSION['reset_success'] = 'Reset Password link has been sent, Check your Email!';
      } catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
     }
     else {
      echo 'Message was not sent';
     }
   }

  }
 }
 header('location: ../forgot_pass.php');

?>