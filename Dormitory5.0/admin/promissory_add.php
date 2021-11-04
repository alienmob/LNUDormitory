<?php
include 'includes/session.php';

if (isset($_POST['promissory'])) {
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

        $sql = "SELECT * FROM unpaid WHERE student_id = '$stud_id' AND status = 0";
		$query = $conn->query($sql);
		if ($query->num_rows > 0) {

		$student_id = $_POST['student_id'];
        $date_from = $_POST['validfrom'];
        $date_to = $_POST['validto'];
        $pnote = $_POST['pnote'];
		$deadline = $_POST['deadline'];
        
        $sql = "SELECT * FROM unpaid WHERE student_id = '$student'";
	    $query = $conn->query($sql);
		$sql = "INSERT INTO promissory (student_id, date_from, date_to, pnote, deadline) VALUES ('$student_id', '$date_from', '$date_to', '$pnote', '$deadline')";
			if ($conn->query($sql)) {
				$sql = "SELECT * FROM promissory WHERE student_id = '$student'";
				
				$query = $conn->query($sql);
					$conn->query($sql);
					} else {
						if (!isset($_SESSION['error'])) {
							$_SESSION['error'] = array();
						}
						$_SESSION['error'][] = $conn->error;
					}
                }


			$equipments = 'Promissory' ;
			$_SESSION['success'] = $added . ' ' . $equipments . ' Added Successfully';
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: promissory.php');
