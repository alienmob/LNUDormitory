
<?php
include 'includes/session.php';

if (isset($_POST['id'])) {

	$id = $_POST['id'];
	$sql = "SELECT *, paid.id AS ID FROM paid LEFT JOIN students ON students.student_id=paid.student_id WHERE paid.id = '$id' ORDER BY date_from, date_to DESC";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
?>