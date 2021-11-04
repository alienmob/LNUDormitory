
<?php
include 'includes/session.php';

if (isset($_POST['id'])) {

	$id = $_POST['id'];
	$sql = "SELECT *, pending.id AS stud FROM pending LEFT JOIN students ON students.student_id=pending.student_id LEFT JOIN equipments ON equipments.id=pending.equipment_id WHERE pending.id = '$id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
?>