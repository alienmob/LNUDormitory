<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<!-- <title>LNU Dormitory | Event Management</title> -->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

  <?php include 'includes/navbar2.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Announcements
        </h1>
        
      </section>
      <!-- Main content -->
      <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          // echo "
          //   <div class='alert alert-danger alert-dismissible'>
          //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //     <h4><i class='icon fa fa-warning'></i> Error!</h4>
          //     ".$_SESSION['error']."
          //   </div>
          // ";
          echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['error']."')</script>';";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          // echo "
          //   <div class='alert alert-success alert-dismissible'>
          //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //     <h4><i class='icon fa fa-check'></i> Success!</h4>
          //     ".$_SESSION['success']."
          //   </div>
          // ";
          echo "'<script type='text/javascript'>toastr.success('Success!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['success']."')</script>';";
          unset($_SESSION['success']);
        }
      ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Dormitory Events</h3>
                
            </div>
              <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
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
                    $sql = "SELECT *, event.id AS studid, event.status AS estat FROM event LEFT JOIN event_category ON event_category.id=event.event_category_id ORDER BY date DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      // if ($row['estat']) {
                      //   $status = '<span class="label label-danger">Cancelled</span>';
                      // } else {
                      //   $status = '<span class="label label-success"></span>';
                      // }


                      date_default_timezone_set('Asia/Manila');
	                    $date = date('Y-m-d');
                      if ($row['status'] == 'Cancelled!') {
                        $status = '<span class="label label-danger">Cancelled!</span>';
                      }
                      if ($row['status'] != 'Cancelled!' AND $row['date'] < $date) {
                        $status = '<span class="label label-success">Done</span>';
                      }
                      if ($row['status'] != 'Cancelled!' AND $row['date'] == $date) {
                        $status = '<span class="label label-info">Today</span>';
                      }
                      if ($row['status'] != 'Cancelled!' AND $row['date'] > $date) {
                        $status = '<span class="label label-default">Upcoming</span>';
                      }


                      echo "
                        <tr>
                          
                          <td>" . $row['event_name'] . "</td>
                          <td>" . $row['description'] . "</td>
                          <td>" . $row['location'] . "</td>
                          <td>" . date('M d, Y', strtotime($row['date'])) . "</td>
                          <td>" . date('h:ia', strtotime($row['time_start'])) . "</td>
                          <td>" . date('h:ia', strtotime($row['time_end'])) . "</td>
                          
                          <td>". $status ."</td>

                          
                        </tr>
                      ";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>

        
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>

  </div>
  <?php include 'includes/scripts.php'; ?>
  
</body>

</html>