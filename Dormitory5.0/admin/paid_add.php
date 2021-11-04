<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$student = $_POST['student_id'];

	$sql = "SELECT * FROM students WHERE student_id = '$student'";
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

		if ($query->num_rows > 0) {
		$unpaid = $query->fetch_assoc();
		$unpaid_id = $unpaid['id'];

		$student_id = $_POST['student_id'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        
        $sql = "SELECT * FROM paid WHERE student_id = '$student'";
	    $query = $conn->query($sql);
		$sql = "INSERT INTO paid (student_id, date_from, date_to) VALUES ('$student_id', '$date_from', '$date_to')";
			if ($conn->query($sql)) {
			$added++;
			$sql = "UPDATE paid SET status = $added WHERE student_id = '$student_id'";
			$conn->query($sql);
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
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: paid.php');
