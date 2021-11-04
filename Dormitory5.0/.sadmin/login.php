<?php
	session_start();
	include 'includes/conn.php';

		
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		
		$sql = "SELECT * FROM superadmin WHERE username = '$username'";
		$query = $conn->query($sql);

		// $sql = "INSERT INTO logs (username, date_time) VALUES ('$username', NOW())";
		// $conn->query($sql);
		

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Username does not exist!';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['superadmin'] = $row['id'];
				$_SESSION['login'] = 'Welcome!&nbsp;&nbsp;&nbsp;&nbsp;'.$row['firstname'].'&nbsp;&nbsp;'.$row['lastname'].'';
			}
			else{
				$_SESSION['error'] = 'Password is Incorrect!';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input Admin Credentials First';
	}

	header('location: index.php');

?>