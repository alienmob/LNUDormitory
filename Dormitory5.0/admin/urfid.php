<?php
 include('includes/conn.php');
	$cardid = $_POST['cardid'];
	$Write="<?php $" . "cardid='" . $cardid . "'; " . "echo $" . "cardid;" . " ?>";
	file_put_contents('UIDContainer.php', $Write);

	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');
	$time = date('h:i a');
	// var_dump($date);
	//FIRST CHECK IF CARDID EXIST IN student TABLE
	if(isset($_POST['cardid'])){
		$id = $_POST['cardid'];
		$sql = "SELECT * FROM students WHERE rfid = '$id'";
		$query = $conn->query($sql);
		if ($query->num_rows == 0) {
			$_SESSION['error'] = 'Rfid is not registered';
			echo 'rfid is not registered';
		}
		else {
			$logbook = "SELECT * FROM `log_book` WHERE rfid_id = '$id' AND `date` = '$date' AND `time_out` IS NULL  OR `time_out` = '' LIMIT 1";
			$logbook_query = $conn->query($logbook);
			// var_dump($logbook_query);
			if($logbook_query->num_rows > 0){
				while($row = $logbook_query->fetch_assoc()){
					$cid =$row['id'];
					$update = "UPDATE `log_book` SET `time_out` = '$time' WHERE `rfid_id` = '$id' AND `id` = '$cid'";
					if($conn->query($update)){
						$update = "UPDATE `students` SET `status` = 1 WHERE `rfid` = '$id'";
						if($conn->query($update)){
						$_SESSION['timeout'] = 'Timeout success';}
					}
				}
				//UPDATE TIME OUT
				echo 'log_book has record already';    
			}
			else {
				//INSERT TO LOG_BOOK
				$insert_log = "INSERT INTO `log_book`(`rfid_id`, `date`, `time_in`) VALUES('$id', '$date', '$time')";
				if($conn->query($insert_log)){
					$_SESSION['success'] = "Attendance success";
					$update = "UPDATE `students` SET `status` = 0 WHERE `rfid` = '$id'";
					if($conn->query($update)){
						echo 'insert to logbook success';
					}
					
				}
				else {
					echo 'error inserting';

				}
			}
		}
	}
?>