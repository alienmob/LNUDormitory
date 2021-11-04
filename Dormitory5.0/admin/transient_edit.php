<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];


		$sql = "UPDATE transient SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', address = '$address', contact = '$contact' WHERE transient_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Transient updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:transient.php');

?>