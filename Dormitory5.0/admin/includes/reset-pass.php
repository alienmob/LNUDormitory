<?php
 include('conn.php');
 session_start();

 if(ISSET($_POST["email"]) && ISSET($_POST["action"]) && ($_POST["action"] == "update")){
   $pass1 = $_POST["pass1"];
   $pass2 = $_POST["pass2"];
   $email = $_POST["email"];
   $token = $_POST["token"];
   $curDate = date("Y-m-d H:i:s");
   $password = password_hash($pass1, PASSWORD_DEFAULT);
   if ($pass1!=$pass2){
    $_SESSION['password_match_error'] = 'Password does not match';
   }
   else {
    $pass1 = md5($pass1);
    $sql = "UPDATE `admin` SET `password`='".$password."' WHERE `email`='". $email ."'";
    if($conn->query($sql)){
     $_SESSION['success'] = 'Password updated successfully';
     $sqldelete = "DELETE FROM `password_reset` WHERE `email`='".$email."'";
     if($conn->query($sqldelete)){
      $_SESSION['success'] = 'Password updated successfully';
      header('location: ../index.php');
      echo 'Reset success';
      exit();
     }
    
    }
    else {
     echo 'Reset failed';
    }

   }		
}

header('location: http://localhost/Dormitory5.0/admin/reset-password.php?token='.$token.'&email='.$email.'&action=reset');

?>
