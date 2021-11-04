

<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['student']) || trim($_SESSION['student']) == ''){
		header('location: login_main.php');
	}

	$sql = "SELECT * FROM students WHERE student_id = '".$_SESSION['student']."'";
	$query = $conn->query($sql);
	$student = $query->fetch_assoc();
	
?>
