<?php
	include 'includes/session.php';

	if(isset($_POST['sub'])){
		
		$title2 = $_POST['title2'];
		$quantity_unservice = $_POST['quantity_unservice'];
		$added = "Marked ";
		$added2 = " as Unserviceable Equipment";

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

		$sql = "INSERT INTO reports (equipment_reports, details) VALUES ('$title2', '$added' '$quantity_unservice' ' ' '$title2' '$added2')";
		if($conn->query($sql)){
			$sql = "UPDATE equipments SET quantity_unservice = $quantity_unservice + quantity_unservice, quantity = quantity - $quantity_unservice, quantity_service = quantity_service - $quantity_unservice, status = 0 WHERE title = '$title2'";
			$conn->query($sql);

			$_SESSION['success'] = $quantity_unservice . ' ' . $title2 . ' marked as Unserviceable equipment/s';
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