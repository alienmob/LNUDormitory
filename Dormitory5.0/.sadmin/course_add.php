<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$code = $_POST['code'];
		$title = $_POST['title'];
		$department = $_POST['department'];
		
		$sql = "INSERT INTO course (code, title, department) VALUES ('$code', '$title', '$department')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: course.php');

?>