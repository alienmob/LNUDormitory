<?php
	include 'includes/session.php';

	if(isset($_POST['pend_del'])){
		$status = $_POST['status'];
		$sql = "DELETE FROM pending WHERE status = 1";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cleared All Approved Status';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Check Status';
	}

	header('location: pending.php');
	
?>