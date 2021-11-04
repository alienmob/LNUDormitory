<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){

		$student_id = $_POST['student_id'];
		$rfid = $_POST['getUID'];
		$password = $_POST['student_id'];
		$password = password_hash($password, PASSWORD_DEFAULT);
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$privilege = $_POST['privilege'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$guardian = $_POST['guardian'];
		$guardian_contact = $_POST['guardian_contact'];
		$floors = $_POST['floor'];
		$rooms = $_POST['room'];
		$course = $_POST['course'];
		$filename = $_FILES['photo']['name'];
		
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating studentid
		// $letters = '';
		// $numbers = '';
		// foreach (range('A', 'Z') as $char) {
		//     $letters .= $char;
		// }
		// for($i = 0; $i < 10; $i++){
		// 	$numbers .= $i;
		// }
		// $student_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//

		// $sql = "SELECT * FROM rooms WHERE id = '$rooms' AND status != 1";
		// 		$query = $conn->query($sql);
				
		// 			$brow = $query->fetch_assoc();
		// 			$occupants = $brow['occupants'];
		// 			$bid = $brow['id'];
		

		$sql = "SELECT * FROM rooms WHERE floor_category_id = '$floors' AND room_category_id = '$rooms'";
				$query = $conn->query($sql);
				
					$brow = $query->fetch_assoc();
					$occupants = $brow['occupants'];
					$occupancy = $brow['occupancy'];
					$status = $brow['status'];
					$bid = $brow['id'];

				$sql = "SELECT * FROM floor_category WHERE id = '$floors'";
				$floor_query = $conn->query($sql);
				$floor_row = $floor_query->fetch_assoc();

				$sql = "SELECT * FROM room_category WHERE id = '$rooms'";
				$room_query = $conn->query($sql);
				$room_row = $room_query->fetch_assoc();

					

					if ($occupants == $occupancy) {

			
					$_SESSION['error'] = '"' .$floor_row['floor_name']. '&nbsp;-&nbsp;' .$room_row['room_name']. '" Is Full';

					
					}else
						if ($status == 1) {
							$_SESSION['error'] = '"' .$floor_row['floor_name']. '&nbsp;-&nbsp;' .$room_row['room_name']. '" Is Unavailable';		
							}
                    else{

						$sql = "SELECT *, rooms.id AS ID FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
                        LEFT JOIN room_category ON room_category.id=rooms.room_category_id WHERE floor_category_id = '$floors' AND room_category_id = '$rooms'";
						$query = $conn->query($sql);
						$row = $query->fetch_assoc();
						$room_id = $row['ID'];

						$sql = "INSERT INTO students (student_id, rfid, password, firstname, lastname, privilege, gender, address, contact, email, guardian, guardian_contact, floor_id, room_id, actualroom_id, course_id, photo) 
						VALUES ('$student_id', '$rfid', '$password', '$firstname', '$lastname', '$privilege', '$gender', '$address', '$contact', '$email', '$guardian', '$guardian_contact', '$floors', '$rooms', '$room_id', '$course', '$filename')";
						if($conn->query($sql)){
				
							$sql = "UPDATE rooms SET occupants = occupants + 1 WHERE floor_category_id = '$floors' AND room_category_id = '$rooms'";
							$conn->query($sql);							
					
							
							$_SESSION['success'] = 'Student added successfully';
						}
						else{
					$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
					$query = $conn->query($sql);
				
				$row = $query->fetch_array();

				$_SESSION['error'] = 'Student ID "' .$row['student_id']. '" Is already in the Database';
							
							// $_SESSION['error'] = $conn->error;
						}


		
					}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: student.php');
?>