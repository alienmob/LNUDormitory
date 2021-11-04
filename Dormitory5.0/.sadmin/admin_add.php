<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$username = $_POST['lastname'];
		$password = $_POST['lastname'];
		$password = password_hash($password, PASSWORD_DEFAULT);
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
        $email = $_POST['email'];
		$contact = $_POST['contact'];
		$filename = $_FILES['photo']['name'];
		
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating studentid
		// $letters = '';
		// $numbers = '';
		// foreach (range('A', 'Z') as $char) {
		//     $letters .= $char;
		// }
		// for($i = 0; $i < 10; $i++){
		// 	$numbers .= $i;
		// }
		// $student_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO admin (username, password, firstname, lastname, address, email, contact, photo) VALUES ('$username', '$password', '$firstname', '$lastname', '$address', '$email', '$contact', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Admin added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: admin.php');
?>