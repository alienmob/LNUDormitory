<?php include 'includes/session.php'; ?>
<?php
	$where = '';
	if(isset($_GET['event_category'])){
		$eventid = $_GET['event_category'];
		$where = 'WHERE event_category_id = '.$eventid;
	}
?>

<?php
if (!isset($_SESSION['student']) || trim($_SESSION['student']) == '') {
	header('index.php');
}

$studid = $_SESSION['student'];
// $sql = "SELECT * FROM borrow LEFT JOIN equipments ON equipments.id=borrow.equipment_id WHERE student_id = '$stuid' ORDER BY date_borrow DESC";
// $action = '';
// if (isset($_GET['action'])) {
// 	$sql = "SELECT * FROM returns LEFT JOIN equipments ON equipments.id=returns.equipment_id WHERE student_id = '$stuid' ORDER BY date_return DESC";
// 	$action = $_GET['action'];

// }


?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar2.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
	
    <!-- <section class="content-header text-white">
      <h1>
        Announcements
      </h1>

    </section> -->

    <!-- Main content -->
    <section class="content">
    <style>
.fc-event-main {
	cursor: pointer !important;
}
</style>
<?php
        if(isset($_SESSION['error'])){
        //   echo "
        //     <div class='alert alert-danger alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-warning'></i> Error!</h4>
        //       ".$_SESSION['error']."
        //     </div>
			
        //   ";
		echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['error']."')</script>';";
          unset($_SESSION['error']);
        }

        if(isset($_SESSION['email_error'])){
        //   echo "
        //     <div class='alert alert-danger alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-warning'></i> Error!</h4>
        //       ".$_SESSION['email_error']."
        //     </div>
        //   ";
		  echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['email_error']."')</script>';";
          unset($_SESSION['email_error']);
        }

        if(isset($_SESSION['reset_success'])){
        //   echo "
        //     <div class='alert alert-success alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-check'></i> Success!</h4>
        //       ".$_SESSION['reset_success']."
        //     </div>
        //   ";
		echo "'<script type='text/javascript'>toastr.success('Success!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['reset_success']."')</script>';";
          unset($_SESSION['reset_success']);
        }

        if(isset($_SESSION['success'])){
        //   echo "
        //     <div class='alert alert-success alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-check'></i> Success!</h4>
        //       ".$_SESSION['success']."
        //     </div>
        //   ";
		echo "'<script type='text/javascript'>toastr.success('Success!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['success']."')</script>';";
          unset($_SESSION['success']);
        }
		if(isset($_SESSION['login'])){
			// echo "
			//   <div class='alert alert-success alert-dismissible'>
			//     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			//     <h4><i class='icon fa fa-check'></i> Success!</h4>
			//     ".$_SESSION['success']."
			//   </div>
			// ";
			echo "'<script type='text/javascript'>toastr.info('&nbsp;&nbsp;".$_SESSION['login']."')</script>';";
			unset($_SESSION['login']);
		  }
      ?>
      <br>
      <div class="row">

		<div class="col-lg-3 col-xs-6 pull-left">
          <!-- small box -->
          <div class="small-box bg-gradient-primary">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM equipments";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Total Equipments</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
            <a href="equipments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        
		


		  <!-- small box -->
		<div class="small-box bg-gradient-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM `returns` WHERE student_id = '$studid'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Returned Equipments</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-reply"></i>
            </div>
            <a href="return.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        
		<!-- small box -->
		<div class="small-box bg-gradient-danger">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM borrow WHERE student_id = '$studid'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Borrowed Equipments</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="borrow.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>

		<div class="col-lg-3 col-xs-6 pull-left">
		

		<!-- small box -->
		<div class="small-box bg-gradient-gray">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM pending WHERE student_id = '$studid'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Pending Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="pending.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

       
		<!-- small box -->
		<div class="small-box bg-gradient-pink">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM unpaid WHERE student_id = '$studid'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Unpaid Records</p>
            </div>
            <div class="icon">
              <i class="fa fa-exclamation-circle"></i>
            </div>
            <a href="unpaid.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        
		<!-- small box -->
		<div class="small-box bg-gradient-info">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM paid WHERE student_id = '$studid'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Paid Records</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="paid.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
      
		<div class="col-xs-6 pull-right">
          <div class="box">
              
            <div class="box-body">
            <h4 class="box-title">Calendar of Dorm Events</h4>
              <div id="calendar">
              </div>
            </div>
          </div>
      
		</div>





	        <!-- <div class="col-xs-7 pull-right">
	  <div class="box">
          
		  <div class="box-body">
		  

			
			<div class="box-header with-border">
		  <h3 class="box-title">LNU Dormitory Events</h3>
		  </div>
			 

			  <div class="table-responsive">
							<table class="table table-bordered table-striped" id="example">
								<thead>
									<th>Event Title</th>
									<th>Description</th>
									<th>Location</th>
									<th>Scheduled Date</th>
									<th>Start</th>
									<th>End</th>
									<th>Status</th>
								</thead>
								<tbody>
								<?php
									$sql = "SELECT * FROM event LEFT JOIN event_category ON event_category.id=event.event_category_id $where";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){
									// 	if ($row['status']) {
									// 		$status = '<span class="label label-danger">Cancelled</span>';
									// } else {
									// 		$status = '<span class="label label-success"></span>';
									// }
										echo "
											<tr>
												
												<td>".$row['event_name']."</td>
												<td>".$row['description']."</td>
												<td>".$row['location']."</td>
												<td>" . date('M d, Y', strtotime($row['date'])) . "</td>
												<td>" . date('h:ia', strtotime($row['time_start'])) . "</td>
												<td>" . date('h:ia', strtotime($row['time_end'])) . "</td>
												<td><span class='label label-danger'>". $row['status'] ."</span></td>
											</tr>
										";
									}
								?>
								</tbody>
							</table>
						</div>
		  </div>
</div>




	  </div> -->



		  <!-- <div class="box">
		  <div class="box-header with-border">
		  <h3 class="box-title">LNU Dormitory Events</h3>
		  </div>
			  <div class="box-header with-border">
				  <div class="input-group col-sm-3 pull-right">
					  <input type="text" class="form-control input-md" id="searchBox" placeholder="Search...">
					  <span class="input-group-btn">
						  <button type="button" class="btn btn-primary btn-rounded btn-md"><i class="fa fa-search"></i> </button>
					  </span>
				  </div>
				  <div class="input-group col-sm-3">
					  <span class="input-group-addon">Category:</span>
					  <select class="form-control" id="eventlist">
						  <option value=0>ALL</option>
						  <?php
							//   $sql = "SELECT * FROM event_category";
							//   $query = $conn->query($sql);
							//   while($eventrow = $query->fetch_assoc()){
							// 	  $selected = ($eventid == $eventrow['id']) ? " selected" : "";
							// 	  echo "
							// 		  <option value='".$eventrow['id']."' ".$selected.">".$eventrow['event_name']."</option>
							// 	  ";
							//   }
						  ?>
					  </select>
				   </div>
			  </div>
			  <div class="box-body">
				  <div class="table-responsive">
							<table class="table table-bordered table-striped" id="booklist">
								<thead>
									<th>Event Title</th>
									<th>Description</th>
									<th>Location</th>
									<th>Scheduled Date</th>
									<th>Start</th>
									<th>End</th>
									<th>Status</th>
								</thead>
								<tbody>
								<?php
									// $sql = "SELECT * FROM event LEFT JOIN event_category ON event_category.id=event.event_category_id $where";
									// $query = $conn->query($sql);
									// while($row = $query->fetch_assoc()){
									// 	if ($row['status']) {
									// 		$status = '<span class="label label-danger">Cancelled</span>';
									// } else {
									// 		$status = '<span class="label label-success"></span>';
									// }
									// 	echo "
									// 		<tr>
												
									// 			<td>".$row['event_name']."</td>
									// 			<td>".$row['description']."</td>
									// 			<td>".$row['location']."</td>
									// 			<td>" . date('M d, Y', strtotime($row['date'])) . "</td>
									// 			<td>" . date('h:ia', strtotime($row['time_start'])) . "</td>
									// 			<td>" . date('h:ia', strtotime($row['time_end'])) . "</td>
									// 			<td>".$status."</td>
									// 		</tr>
									// 	";
									// }
								?>
								</tbody>
							</table>
						</div>
			  </div>
			
		  </div> -->

		  

</section>
		</div>
</div>
  
  	
	<?php include 'includes/info-modal.php'; ?>

<?php include 'includes/scripts.php'; ?>

<script>

document.addEventListener('DOMContentLoaded', async function() {
		let response = await fetch('includes/fetch_event.php');
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				events: response,
				eventClick: function(info) {
					 console.log(info.event.extendedProps);
						$('#eventtitle').text(info.event.extendedProps.full_info.event_name);
						$('#eventdescription').text(info.event.extendedProps.full_info.description);
						$('#eventlocation').text(info.event.extendedProps.full_info.location);
						$('#eventdate').text(info.event.extendedProps.full_info.date);
						$('#eventstart').text(info.event.extendedProps.full_info.time_start);
						$('#eventend').text(info.event.extendedProps.full_info.time_end);
						$('#eventstatus').text(info.event.extendedProps.full_info.status);
						$('#infomodal').modal('show')
				}
		});
		calendar.render();
});
</script>

</body>
</html>