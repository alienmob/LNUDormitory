<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		
		$title = $_POST['title'];
		$quantity_service = $_POST['quantity_service'];
		$added = "Added ";
		$added2 = " as Serviceable Equipment";
		//creating code
		// $letters = '';
		// $numbers = '';
		// foreach (range('A', 'Z') as $char) {
		//     $letters .= $char;
		// }
		// for($i = 0; $i < 10; $i++){
		// 	$numbers .= $i;
		// }
		// $code = substr(str_shuffle($letters), 0, 1).substr(str_shuffle($numbers), 0, 2);
		//

		$sql = "INSERT INTO reports (equipment_reports, details) VALUES ('$title', '$added' '$quantity_service' ' ' '$title' '$added2')";
		if($conn->query($sql)){
			$sql = "UPDATE equipments SET quantity = $quantity_service + quantity, quantity_service = $quantity_service + quantity_service, quantity_total = $quantity_service + quantity_total, status = 0 WHERE title = '$title'";
			$conn->query($sql);

			$_SESSION['success'] = $quantity_service . ' ' . $title . ' successfully added';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: equipment_u.php');

?>