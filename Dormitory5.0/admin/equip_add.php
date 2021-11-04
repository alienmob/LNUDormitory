<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$code = $_POST['code'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$quantity = $_POST['quantity'];
		$quantity_service = $_POST['quantity_service'];
		$quantity_unservice = $_POST['quantity_unservice'];
		$quantity_total = $_POST['quantity_total'];

		//creating code
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$code = substr(str_shuffle($letters), 0, 1).substr(str_shuffle($numbers), 0, 2);
		//

		$sql = "INSERT INTO equipments (code, category_id, title, quantity, quantity_service, quantity_unservice, quantity_total) VALUES ('$code', '$category', '$title', '$quantity_service', '$quantity_service', '$quantity_unservice', '$quantity_service' + '$quantity_unservice')";
		if($conn->query($sql)){
			$sql = "UPDATE equipments SET quantity_total = $quantity_service + $quantity_unservice, status = 0 WHERE id = '$bid'";
			$conn->query($sql);

			$_SESSION['success'] = 'Equipment added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: equipment.php');

?>