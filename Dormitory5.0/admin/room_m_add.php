<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		

        // $sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
        // LEFT JOIN room_category ON room_category.id=rooms.room_category_id";
        // $query = $conn->query($sql);
        // $row = $query->fetch_array();


		$room = $_POST['room'];
		$increase = $_POST['increase'];
		$added = "Occupancy increased by";
		$reason_add = $_POST['reason_add'];

		$sql = "INSERT INTO room_report (room_id, details, reason) VALUES ('$room', '$added' ' ' '$increase','$reason_add')";
		if($conn->query($sql)){
			$sql = "UPDATE rooms SET occupancy = $increase + occupancy WHERE id = '$room'";
			$conn->query($sql);

			$_SESSION['success'] = $added . ' ' . $increase . '';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: room_m.php');

?>