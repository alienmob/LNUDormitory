<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
	LEFT JOIN room_category ON room_category.id=rooms.room_category_id WHERE rooms.id = '$id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
