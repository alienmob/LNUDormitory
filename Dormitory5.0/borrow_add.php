<?php
include 'includes/session.php';


if (isset($_POST['add'])) {

	$row = $query->fetch_assoc();
	$student_id = $_SESSION['student'];
	$note = $_POST['note'];
	// $title = $_POST['title'];
	// $sql = "SELECT * FROM equipments WHERE title = '$title' AND status != 1";
	// $query = $conn->query($sql);

	$sql = "SELECT *, pending.status AS pendstat FROM pending LEFT JOIN equipments ON equipments.id=pending.equipment_id";
		$query = $conn->query($sql);
		
			$trow = $query->fetch_assoc();
			$status = $trow['pendstat'];
			$quantity1 = $trow['quantity'];
			$title = $trow['title'];
			if ($quantity1 == 1 && $status == 0) {
				$_SESSION['error'] = 'Last Stock for Equipment "' . $title . '" is on Pending';
				header('location: equipments.php');
			}else

		foreach ($_POST['code'] as $code) {
			
			if (!empty($code)) {
				
				$sql = "SELECT * FROM equipments WHERE code = '$code'";
				$query = $conn->query($sql);
				
					$brow = $query->fetch_assoc();
					$quantity = $brow['quantity'];
					$title = $brow['title'];
					$bid = $brow['id'];
					if ($quantity == 0) {
						$_SESSION['error'] = 'Equipment "' . $title . '" Is Unavailable';
						header('location: equipments.php');
					}else{

					$sql = "INSERT INTO pending (student_id, equipment_id, note) VALUES ('$student_id', '$bid', '$note')";
					if($conn->query($sql)){
						$_SESSION['success'] = 'Borrow Request is Pending for Approval';
						header('location: pending.php');
					}
					else{
						$_SESSION['error'] = $conn->error;
						header('location: equipments.php');
					}
					}	
				}	
				else{
					$_SESSION['error'] = 'Fill up add form first';
					header('location: equipments.php');
				}
				}
			}

?>