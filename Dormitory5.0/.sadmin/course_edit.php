<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$code = $_POST['code'];
		$title = $_POST['title'];
		$department = $_POST['department'];

		$sql = "UPDATE course SET code = '$code', title = '$title', department = '$department' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:course.php');

?>