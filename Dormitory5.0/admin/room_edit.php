<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$room = $_POST['room'];
		$floor_category = $_POST['floor_category'];
		$room_category = $_POST['room_category'];

		$sql = "UPDATE rooms SET room = '$room', floor_category_id = '$floor_category', room_category_id = '$room_category' WHERE id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Room updated successfully';
			}

		else{
		$sql = "SELECT * FROM rooms";
		$query = $conn->query($sql);
		$row = $query->fetch_array();
		$floorcat = $row['floor_category_id'];
		$roomcat = $row['room_category_id'];


				if($floor_category == $floorcat && $room_category == $roomcat){	


				$sql = "SELECT * FROM floor_category WHERE id = '$floor_category'";
				$floor_query = $conn->query($sql);
				$floor_row = $floor_query->fetch_assoc();

				$sql = "SELECT * FROM room_category WHERE id = '$room_category'";
				$room_query = $conn->query($sql);
				$room_row = $room_query->fetch_assoc();

				$_SESSION['error'] = 'Category "' .$floor_row['floor_name'].' - '.$room_row['room_name'].'" Is already in the Database';
			// $_SESSION['error'] = $conn->error;
		}
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:room.php');


?>


