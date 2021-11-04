<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Rooms Reports</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Room Reports 
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Facility</li>
          <li class="active text-white">Reports</li>
        </ol>
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
        

              <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <th>Date</th>
                    <th>Rooms</th>
                    <th>Details</th>
                    <th>Reason</th>
                  </thead>
                  <tbody>
                    <?php
                     $sql = "SELECT * FROM room_report LEFT JOIN rooms ON rooms.id=room_report.room_id 
                     LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
                     LEFT JOIN room_category ON room_category.id=rooms.room_category_id ORDER BY date_reports DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                    
                      echo "
                        <tr>
                          <td>" . date('M d, Y | h:ia', strtotime($row['date_reports'])) . "</td>
                          <td>" . $row['floor_name'] .'&nbsp;-&nbsp;'. $row['room_name'] . "</td>  
                          <td>" . $row['details'] . "</td>
                          <td>" . $row['reason'] . "</td>
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