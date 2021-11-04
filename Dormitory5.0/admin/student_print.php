<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Print Student Record</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    
    <link rel="stylesheet" href="assets/css/print.css" media="print">

  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css" rel="stylesheet" />
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  	<style type="text/css">
      body {
		font-family: 'Varela Round', sans-serif;
	}
  	</style>
</head>

<body>



  <!-- Content Wrapper. Contains page content -->

  <div class="box-header with-border">
        <button onclick="window.print();" class="btn btn-sm btn-info btn-rounded pull-right" id="print-btn"><i class="fa fa-print"></i>Print</button>
    </div>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">



              <table class="table table-bordered table-striped print">
                <thead>
                  
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Privilege</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Contact No.</th>
                  <th>Email</th>
                  <th>Name of Guardian</th>
                  <th>Contact# of Guardian</th>
                  <th>Room</th>
                  <th>Course</th>
                </thead>
                <tbody>
                  <?php
 
                    $sql = "SELECT *, students.student_id AS studid FROM students LEFT JOIN course ON course.id=students.course_id LEFT JOIN rooms ON rooms.id=students.room_id";
                    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          
  
                          <td>".$row['student_id']."</td>
                          <td>".$row['firstname']. ' ' .$row['lastname']."</td>
                          <td>".$row['privilege']."</td>
                          <td>".$row['gender']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['contact']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['guardian']."</td>
                          <td>".$row['guardian_contact']."</td>
                          <td>".$row['description']."</td>
                          <td>".$row['code']."</td>
        
                        </tr>
                      ";
                    }

                  ?>
                </tbody>
              </table>
        </div>
      </div>
    </section>   

    


</body>
</html>
