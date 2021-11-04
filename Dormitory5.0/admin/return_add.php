<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$student = $_POST['student'];

	$sql = "SELECT * FROM students WHERE student_id = '$student'";
	$query = $conn->query($sql);
	if ($query->num_rows < 1) {
		if (!isset($_SESSION['error'])) {
			$_SESSION['error'] = array();
		}
		$_SESSION['error'][] = 'Student not found';
	} else {
		$row = $query->fetch_assoc();
		$student_id = $row['student_id'];  //
		$return = 0;
		foreach ($_POST['code'] as $code) {
			if (!empty($code)) {
				$sql = "SELECT * FROM equipments WHERE code = '$code'";
				$query = $conn->query($sql);
				if ($query->num_rows > 0) {
					$brow = $query->fetch_assoc();
					$quantity = $brow['quantity'];
					$bid = $brow['id'];

					$sql = "SELECT * FROM borrow WHERE student_id = '$student_id' AND equipment_id = '$bid' AND status = 0";
					$query = $conn->query($sql);
					if ($query->num_rows > 0) {
						$borrow = $query->fetch_assoc();
						$borrow_id = $borrow['id'];
						$sql = "INSERT INTO returns (student_id, equipment_id) VALUES ('$student_id', '$bid')";
						if ($conn->query($sql)) {
							$return++;
							$sql = "UPDATE equipments SET quantity = $quantity + 1, quantity_used = quantity_used - 1, status = 0 WHERE id = '$bid'";
							$conn->query($sql);
							$sql = "DELETE FROM `borrow` WHERE id = '$borrow_id'";
							$conn->query($sql);
						} else {
							if (!isset($_SESSION['error'])) {
								$_SESSION['error'] = array();
							}
							$_SESSION['error'][] = $conn->error;
						}
					} else {
						if (!isset($_SESSION['error'])) {
							$_SESSION['error'] = array();
						}
						$_SESSION['error'][] = 'Borrow details not found: Equipment Code - ' . $code . ', Student ID: ' . $student;
					}
				} else {
					if (!isset($_SESSION['error'])) {
						$_SESSION['error'] = array();
					}
					$_SESSION['error'][] = 'Equipment not found: Equipment Code - ' . $code;
				}
			}
		}

		if ($return > 0) {
			$equipments = ($return == 1) ? 'Equipment' : 'Equipments';
			$_SESSION['success'] = $return . ' ' . $equipments . ' successfully returned';
		}
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: return.php');
