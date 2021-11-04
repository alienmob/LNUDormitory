<?php
	include 'includes/session.php';

	if(isset($_POST['minus'])){
		

        // $sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
        // LEFT JOIN room_category ON room_category.id=rooms.room_category_id";
        // $query = $conn->query($sql);
        // $row = $query->fetch_array();


		$room_m = $_POST['room_m'];
		$decrease = $_POST['decrease'];
		$added = "Occupancy decreased by";
		$reason_minus = $_POST['reason_minus'];
		


		$sql = "INSERT INTO room_report (room_id, details, reason) VALUES ('$room_m', '$added' ' ' '$decrease', '$reason_minus')";
		if($conn->query($sql)){
			$sql = "UPDATE rooms SET occupancy = occupancy - $decrease WHERE id = '$room_m'";
			$conn->query($sql);

			$_SESSION['success'] = $added . ' ' . $decrease . '';
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