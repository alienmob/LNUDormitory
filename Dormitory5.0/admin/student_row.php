<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, students.student_id AS studid FROM students LEFT JOIN course ON course.id=students.course_id 
		LEFT JOIN floor_category ON floor_category.id=students.floor_id LEFT JOIN room_category ON room_category.id=students.room_id 
		WHERE students.student_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>