<?php
include 'includes/session.php';

if (isset($_POST['pay'])) {
	$uid = $_POST['stud'];
	$student_id = $_POST['students'];
	$date_from = $_POST['validfrom'];
	$date_to = $_POST['validto'];
	$upload2 = $_POST['upload2'];

	$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
	$query = $conn->query($sql);
	if ($query->num_rows < 1) {
		if (!isset($_SESSION['error'])) {
			$_SESSION['error'] = array();
		}
		$_SESSION['error'][] = 'Student not found';
	} else {
        $row = $query->fetch_assoc();
		$stud_id = $row['student_id'];  //
		$added = 0;
        $sql = "SELECT * FROM unpaid WHERE student_id = '$stud_id' AND status = 0";
		$query = $conn->query($sql);
		$unpaid = $query->fetch_assoc();
		$unpaid_id = $unpaid['id'];
		$sql = "INSERT INTO paid (student_id, date_from, date_to, receipt) VALUES ('$student_id', '$date_from', '$date_to', '$upload2')";
			if ($conn->query($sql)) {
			$added++;
			$sql = "UPDATE paid SET status = $added WHERE student_id = '$student_id'";
			$conn->query($sql);
			// $sql = "UPDATE promissory SET status = $added WHERE student_id = '$student_id'";
			// $conn->query($sql);
            $sql = "DELETE FROM `unpaid` WHERE id = '$uid'";
			$conn->query($sql);
			// $sql = "DELETE FROM `promissory` WHERE status = 1";
			// $conn->query($sql);

			
			

					} else {
						if (!isset($_SESSION['error'])) {
							$_SESSION['error'] = array();
						}
						$_SESSION['error'][] = $conn->error;
					}
                }

		if ($added > 0) {
			$equipments = ($added == 1) ? 'Payment' : 'Payments';
			$_SESSION['success'] = $added . ' ' . $equipments . ' Paid Successfully';
		}
	
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: paid.php');



