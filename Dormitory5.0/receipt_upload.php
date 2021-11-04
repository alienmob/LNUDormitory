<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_SESSION['student'];
		$uid = $_POST['studid'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$filename);	
		}
		
		$sql = "UPDATE unpaid SET receipt = '$filename' WHERE id = '$uid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Receipt uploaded successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select data to upload photo first';
	}

	header('location: unpaid.php');
?>