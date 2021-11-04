<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "SELECT *, students.student_id AS stud_id FROM students LEFT JOIN rooms ON rooms.floor_category_id=students.floor_id 
		AND rooms.room_category_id=students.room_id WHERE students.student_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$occupants = $row['occupants'];
		$rid = $row['id'];


		$sql = "DELETE FROM students WHERE student_id = '$id'";
		if($conn->query($sql)){


			$sql = "UPDATE rooms SET occupants = occupants - 1 WHERE id = '$rid'";
			$conn->query($sql);


			$_SESSION['success'] = 'Student deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: student.php');
	
?>