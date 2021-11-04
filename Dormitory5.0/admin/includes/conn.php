<?php
	$conn = new mysqli('localhost', 'root', '', 'dorm_lnu');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>