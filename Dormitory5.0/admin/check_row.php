<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, checkin.id AS checkid FROM checkin LEFT JOIN transient ON transient.transient_id=checkin.transient_id 
		LEFT JOIN floor_category ON floor_category.id=checkin.floor_id LEFT JOIN room_category ON room_category.id=checkin.room_id
		WHERE checkin.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>