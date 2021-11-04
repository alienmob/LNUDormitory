<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'equipment.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$photo = $_FILES['photo']['name'];
		if(password_verify($curr_password, $student['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $student['photo'];
			}

			if($password == $student['password']){
				$password = $student['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE students SET password = '$password', firstname = '$firstname', lastname = '$lastname', address = '$address', contact = '$contact', photo = '$filename' WHERE student_id = '".$student['student_id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Student profile updated successfully';
			}
			
			
		}
			else{
				$_SESSION['error'] = 'Current Password is Incorrect, Changes was not applied';
			}
	}

		else{
			$_SESSION['error'] = 'Fill up required details first';
		}
		
	

	header('location:'.$return);

?>