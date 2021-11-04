<?php
	include 'includes/session.php';

	if(isset($_POST['option'])){
		


		$room_option = $_POST['room_option'];
		$status = $_POST['status'];
		$reason = $_POST['reason'];

        $available = 'Marked as Available';
        $unavailable = 'Marked as Unavailable';


		if($status == 1){

            $sql = "INSERT INTO room_report (room_id, details, reason) VALUES ('$room_option', '$available', '$reason')";
            $conn->query($sql);
            
			$sql = "UPDATE rooms SET `status` = 0 WHERE id = '$room_option'";
			$conn->query($sql);

			$_SESSION['success'] = 'Room ' . $available . '';
		}
		else if($status == 2){
			$sql = "INSERT INTO room_report (room_id, details, reason) VALUES ('$room_option', '$unavailable', '$reason')";
            $conn->query($sql);
            
			$sql = "UPDATE rooms SET `status` = 1 WHERE id = '$room_option'";
			$conn->query($sql);

			$_SESSION['success'] = 'Room ' . $unavailable . '';
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