<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'includes/session.php';

require 'phpmailer/vendor/autoload.php';

include('includes/conn.php');

require_once 'includes/config.php';

	if(isset($_POST['attendance'])){
        $event = $_POST['event'];
		$attendance = $_POST['e_attendance'];


$sql = "SELECT * FROM `event` WHERE id = $event";
$query = $conn->query($sql);
$row = $query->fetch_assoc();

$event_id = $row['event_category_id'];
$date = $row['date'];
$time_start = $row['time_start'];
$time_end = $row['time_end'];


$sql = "SELECT * FROM `event_category` WHERE id = $event_id";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$name = $row['event_name'];


		// EMAIL

$sql = "SELECT email FROM `students` WHERE status = 0";
$query = $conn->query($sql);
// $query = $conn->query($sql);
// while ($row = $query->fetch_assoc()) {
 
while ($row = $query->fetch_assoc()) {
$email = $row['email'];




  $output='<p>Dear Students,</p>';
  $output.='<p>This is LNU Student Dormitory</p>';
  $output.='<p>Announcement for LNU Student Dormitory Boarders</p>';
  $output.='<hr>';
  
  $output.='<h4>WHAT : '.$name.'</h4>';
  $output.='<h4>WHEN : '. date('M d, Y', strtotime($date)) .' | '. date('h:ia', strtotime($time_start)) .' to '. date('h:ia', strtotime($time_end)) .'</h4>';

  $output.='<h3>Here is the attendance link for the event...</h3>';
  $output.='<h3>'.$attendance.'</h3>';
  $output.='<p>Only those students that are currently timed in are the ones that may receive the attendance link! Thank You!.</p>';   	
  $output.='<p>LNU Dormitory Administrator</p>';
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
   $phpmailer->Subject = 'LNU Dormitory Announcement';
   $phpmailer->Body    = $body;

   $phpmailer->send();
   
   echo 'Message has been sent';
   $_SESSION['email_success'] = 'Notification sent!';
  } catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
 }





// END EMAIL

$sql = "UPDATE `event` SET attendance = '$attendance' WHERE id = '$event' AND status != 'Cancelled!'";
if($conn->query($sql)){
    $_SESSION['success'] = 'Attendance Link Sent!';
}
else{
    $_SESSION['error'] = $conn->error;
}
}
else{
$_SESSION['error'] = 'Fill up edit form first';
}


	header('location: event.php');
?>