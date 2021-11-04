<?php
	include 'includes/session.php';

	if(isset($_POST['cancel_clear'])){
		$status = $_POST['status'];
		$stat = "Cancelled!";
		$sql = "DELETE FROM event WHERE status = '{$stat}'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cleared All Cancelled Status';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Check Status';
	}

	header('location: event.php');
	
?>