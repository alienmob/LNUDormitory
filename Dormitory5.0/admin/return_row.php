
<?php
include 'includes/session.php';

if (isset($_POST['id'])) {

	$id = $_POST['id'];
	$sql = "SELECT *, borrow.id AS stud FROM borrow LEFT JOIN students ON students.student_id=borrow.student_id LEFT JOIN equipments ON equipments.id=borrow.equipment_id WHERE borrow.id = '$id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
?>