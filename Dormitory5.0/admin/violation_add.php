<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$student_id = $_POST['student_id'];
		$violation = $_POST['violation'];
		$date = $_POST['date'];
		
	$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
	$query = $conn->query($sql);
	if ($query->num_rows < 1) {
		if (!isset($_SESSION['error'])) {
			$_SESSION['error'] = array();
		}
		$_SESSION['error'] = 'Student Number not found';
	} else {


		$sql = "INSERT INTO violations (student_id, date, violation) VALUES ('$student_id', '$date', '$violation')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Violation Recorded successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: violation.php');

?>