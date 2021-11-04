<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Student Status</title>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Student Status
      </h1>
      <ol class="breadcrumb bg-default">
        <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Student Logs</li>
        <li class="active text-white">Status</li>
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
            <!-- <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> New</a>
            </div> -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Room</th>
                  <th>Address</th>
                  <th>Contact No.</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, students.student_id AS studid FROM students LEFT JOIN course ON course.id=students.course_id 
                    LEFT JOIN floor_category ON floor_category.id=students.floor_id LEFT JOIN room_category ON room_category.id=students.room_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      
                        if ($row['status']) {
                          
                            $status = '<span class="label label-danger">OUT</span>';
                          } else {
                            $status = '<span class="label label-success">IN</span>';
                          }
                      echo "
                        <tr>
                          
                          <td>".$row['student_id']."</td>
                          <td>".$row['firstname']. ' ' .$row['lastname']."</td>
                          <td>".$row['floor_name'].'-'.$row['room_name']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['contact']."</td>
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
  <?php include 'includes/student_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

</body>
</html>
