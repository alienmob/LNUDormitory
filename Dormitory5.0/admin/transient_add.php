<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$floor_id = $_POST['floor'];
		$room_id = $_POST['room'];
        $date_in = $_POST['date_in'];
        $time_in = $_POST['time_in'];
        $date_out = $_POST['date_out'];
        $time_out = $_POST['time_out'];
		
		$added = 0;
		//creating transientid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$transient_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 4);
		//

		$sql = "SELECT * FROM rooms WHERE floor_category_id = '$floor_id' AND room_category_id = '$room_id'";
				$query = $conn->query($sql);
				
					$brow = $query->fetch_assoc();
					$occupants = $brow['occupants'];
					$occupancy = $brow['occupancy'];
					$status = $brow['status'];
					$bid = $brow['id'];

				$sql = "SELECT * FROM floor_category WHERE id = '$floor_id'";
				$floor_query = $conn->query($sql);
				$floor_row = $floor_query->fetch_assoc();

				$sql = "SELECT * FROM room_category WHERE id = '$room_id'";
				$room_query = $conn->query($sql);
				$room_row = $room_query->fetch_assoc();


				if ($occupants == $occupancy) {

				
					$_SESSION['error'] = '"' .$floor_row['floor_name']. '&nbsp;-&nbsp;' .$room_row['room_name']. '" Is Full';

					
						
					}else if ($status == 1) {
							$_SESSION['error'] = '"' .$floor_row['floor_name']. '&nbsp;-&nbsp;' .$room_row['room_name']. '" Is Unavailable';		
					}else{
		$sql = "INSERT INTO transient (transient_id, firstname, lastname, gender, address, contact) VALUES ('$transient_id', '$firstname', '$lastname', '$gender', '$address', '$contact')";
		if($conn->query($sql)){
			$sql = "INSERT INTO checkin (transient_id, floor_id, room_id, date_in, time_in, date_out, time_out) VALUES ('$transient_id', '$floor_id', '$room_id', '$date_in', '$time_in', '$date_out', '$time_out')";
			$conn->query($sql);

			$added++;
			$sql = "UPDATE transient SET status = $added WHERE transient_id = '$transient_id'";
			$conn->query($sql);

			$sql = "UPDATE rooms SET occupants = occupants + 1 WHERE floor_category_id = '$floor_id' AND room_category_id = '$room_id'";
			$conn->query($sql);	
			$_SESSION['success'] = 'Transient added successfully';
		}
		
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: transient.php');
?>