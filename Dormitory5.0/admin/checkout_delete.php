<?php
	include 'includes/session.php';

	if(isset($_POST['check_del'])){
		$status = $_POST['status'];
		$sql = "DELETE FROM checkout WHERE status = 0";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cleared All Checked Out Record';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Check Status';
	}

	header('location: checkout.php');
	
?>