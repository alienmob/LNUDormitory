<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];

		$title = $_POST['title'];
		$category = $_POST['category'];
		$quantity = $_POST['quantity'];
		$quantity_service = $_POST['quantity_service'];
		$quantity_unservice = $_POST['quantity_unservice'];
		$quantity_total = $_POST['quantity_total'];

		//creating code
		// $letters = '';
		// $numbers = '';
		// foreach (range('A', 'Z') as $char) {
		//     $letters .= $char;
		// }
		// for($i = 0; $i < 10; $i++){
		// 	$numbers .= $i;
		// }
		// $code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "UPDATE equipments SET title = '$title', category_id = '$category', quantity = '$quantity_total' - '$quantity_unservice', quantity_service = '$quantity_total' - '$quantity_unservice', quantity_unservice = '$quantity_unservice', quantity_total = '$quantity_total' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Equipment updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:equipment.php');

?>