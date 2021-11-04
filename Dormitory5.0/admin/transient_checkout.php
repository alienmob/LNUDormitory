<?php
include 'includes/session.php';

if (isset($_POST['checkout'])) {
	$transient = $_POST['transient_id'];

	$sql = "SELECT * FROM transient WHERE transient_id = '$transient'";
	$query = $conn->query($sql);
	if ($query->num_rows < 1) {
		if (!isset($_SESSION['error'])) {
			$_SESSION['error'] = 'Transient ID not found';
			header('location: checkin.php');
		}
		$_SESSION['error'][] = 'Transient ID not found';
		header('location: checkin.php');
	} else {
        $row = $query->fetch_assoc();
		$transient_id = $row['transient_id'];  //
		$added = 1;

		if ($query->num_rows > 0) {

			$floor_id = $_POST['floor'];
			$room_id = $_POST['room'];
        $date_in = $_POST['date_in'];
        $time_in = $_POST['time_in'];
        $date_out = $_POST['date_out'];
        $time_out = $_POST['time_out'];

        
        // $sql = "SELECT * FROM transient WHERE transient_id = '$transient'";
	    // $query = $conn->query($sql);
		$sql = "INSERT INTO checkout (transient_id, floor_id, room_id, date_in, time_in, date_out, time_out) VALUES ('$transient_id', '$floor_id', '$room_id', '$date_in', '$time_in', '$date_out', '$time_out')";
			if ($conn->query($sql)) {
			$added--;
			$sql = "UPDATE transient SET status = $added WHERE transient_id = '$transient_id'";
			$conn->query($sql);
            $sql = "DELETE FROM `checkin` WHERE transient_id = '$transient_id'";
			$conn->query($sql);
			$sql = "UPDATE rooms SET occupants = occupants - 1 WHERE floor_category_id = '$floor_id' AND room_category_id = '$room_id'";
			$conn->query($sql);
			
			$_SESSION['success'] = 'Transient "'.$transient.'" Checked Out Successfully';
			}
				
		
		}
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
	header('location: checkin.php');
}
	
header('location: checkout.php');


