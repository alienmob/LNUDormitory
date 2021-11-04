<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$students = $_POST['student_id'];
		$status = $_POST['status'];
		$reason = $_POST['reason'];


		$sql = "INSERT INTO logs (student_id, status, reason) VALUES ('$students', '$status', '$reason')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Log added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: log.php');

?>