<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Check Out Status</title>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Check Out Status
      </h1>
      <ol class="breadcrumb bg-default">
        <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transient Management</li>
        <li class="active text-white">Check Out Status</li>
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
          <div class="box-header with-border">
              <a href="#check_del" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded"><i class="fa fa-trash"></i> Clear Record</a>
            </div>

            <div class="box-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered table-striped">
                <thead>

                  <th>Transient ID</th>
                  <th>Name</th>
                  <th>Room</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  <th>Status</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, checkout.id AS check2id, checkout.status AS outstat FROM checkout LEFT JOIN transient ON transient.transient_id=checkout.transient_id 
                    LEFT JOIN floor_category ON floor_category.id=checkout.floor_id LEFT JOIN room_category ON room_category.id=checkout.room_id";
                    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        if ($row['outstat']) {
                            $status = '<span class="label label-success">Checked In</span>';
                          } else {
                            $status = '<span class="label label-danger">Checked Out</span>';
                          }
                      echo "
                        <tr>
                          
                          <td>".$row['transient_id']."</td>
                          <td>".$row['firstname']. ' ' .$row['lastname']."</td>
                          <td>".$row['floor_name'].'-'.$row['room_name']."</td>
                          <td>" . date('M d, Y', strtotime($row['date_in'])) . ' ' . date('h:ia', strtotime($row['time_in'])) . "</td>
                          <td>" . date('M d, Y', strtotime($row['date_out'])) . ' ' . date('h:ia', strtotime($row['time_out'])) . "</td>
                          <td>".$status."</td>
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
  <?php include 'includes/transient_modal.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>

</body>
</html>
