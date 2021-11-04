<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		
		$sql = "SELECT * FROM `transient`";
		$query = $conn->query($sql);
		
			$row = $query->fetch_assoc();

			$status = $row['status'];

if($status == 1){
	$_SESSION['error'] = 'Selected Transient is currently Checked In';
}
else{
	$sql = "DELETE FROM transient WHERE transient_id = '$id' AND `status` = 0";
		$conn->query($sql);
			$_SESSION['success'] = 'Transient deleted successfully';
		}
		
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: transient.php');
	
?>