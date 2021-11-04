<?php
	include 'includes/session.php';

	if(isset($_POST['prom_del'])){
		$status = $_POST['status'];
		$sql = "DELETE FROM promissory WHERE status = 1";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cleared All Paid Status';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Check Status';
	}

	header('location: promissory.php');
	
?>