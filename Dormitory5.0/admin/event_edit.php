<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$event_category = $_POST['event_category'];
		$description = $_POST['description'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$time_start = $_POST['time_start'];
		$time_end = $_POST['time_end'];

		$sql = "UPDATE event SET event_category_id = '$event_category', description = '$description', location = '$location', date = '$date', time_start = '$time_start', time_end = '$time_end' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Event Updated Successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:event.php');

?>