<?php
    session_start();
	include 'includes/session.php';

	if(isset($_POST['login'])){
		$student = $_POST['student'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM students WHERE student_id = '$student'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Student ID does not exist';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['student'] = $row['student_id'];
				$_SESSION['login'] = 'Welcome!&nbsp;&nbsp;&nbsp;&nbsp;'.$row['firstname'].'&nbsp;&nbsp;'.$row['lastname'].'';
			}
			else{
				$_SESSION['error'] = 'Password is Incorrect';
			}
		}
		
	}
	
	else{
		$_SESSION['error'] = 'Input Credentials First';
	}

	header('location: login_main.php');


?>