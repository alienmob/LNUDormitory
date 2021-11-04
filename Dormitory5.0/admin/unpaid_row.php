<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, unpaid.student_id AS stud FROM unpaid LEFT JOIN students ON students.student_id=unpaid.student_id WHERE unpaid.student_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>