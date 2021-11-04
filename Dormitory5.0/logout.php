<?php
	// session_start();
	// session_destroy();

	// header('location: index.php');
?>

<?php
session_start();
unset($_SESSION['student']);
header('location: login_main.php');


?>