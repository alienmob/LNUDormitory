<?php include 'includes/session.php'; ?>
<?php
if (!isset($_SESSION['student']) || trim($_SESSION['student']) == '') {
	header('index.php');
}

$stuid = $_SESSION['student'];
$sql = "SELECT * FROM unpaid WHERE student_id = '$stuid' ORDER BY date_unpaid DESC";
$action = '';
if (isset($_GET['action'])) {
	$sql = "SELECT * FROM paid WHERE student_id = '$stuid' ORDER BY date_paid DESC";
	$action = $_GET['action'];
	
}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar2.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Paid Record
      </h1>
      
    </section>

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
      ?>
      <br>
      
      <div class="box">
							<!-- <div class="box-header with-border">
									<a href="#promissory" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded"><i class="fa fa-plus"></i> Promissory</a>
								</div> -->
								<div class="box-header with-border">
									<h3 class="box-title">Paid Record</h3>
									
								</div>
								

								<div class="box-body">
				 				 <div class="table-responsive">
									<table class="table table-bordered table-striped" id="example">
										<thead>
											<th class="hidden"></th>
                                            <th>Date Paid</th>
											<th>Valid Through</th>
											<th>Status</th>
					
										</thead>
										<tbody>
											<?php
$sql = "SELECT *, paid.status AS status FROM paid  WHERE student_id = '$stuid' ORDER BY date_paid DESC";			
											$query = $conn->query($sql);
											while ($row = $query->fetch_assoc()) {
												if ($row['status']) {
													$status = '<span class="label label-success">Paid</span>';
												  } else {
													$status = '<span class="label label-danger">Unpaid</span>';
												  }
												$date = (isset($_GET['action'])) ? 'date_paid' : 'date_unpaid';
												echo "
			        						<tr>
			        							<td class='hidden'></td>
                                                <td>" . date('M d, Y', strtotime($row['date_paid'])) . "</td>
                                                <td>" . date('M d, Y', strtotime($row['date_from'])) . ' - ' . date('M d, Y', strtotime($row['date_to'])) . "</td>
												<td>" . $status . "</td>
											
			        						</tr>
			        					";
											}
											?>
										</tbody>
									</table>
								</div>
								</div>
							</div>




</section>
		</div>
</div>
  
	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>