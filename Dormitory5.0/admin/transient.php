<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Transient List</title>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Transient List
      </h1>
      <ol class="breadcrumb bg-default">
        <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transient Management</li>
        <li class="active text-white">Transient List</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> New</a>
            </div>

            <div class="box-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  <th>Date Registered</th>
                  <th>Transient ID</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Contact No.</th>
                  <th>Status</th>
                  <th>Actions</th>
                  <th>Check In</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, transient.transient_id AS tranid FROM transient";
                    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        if ($row['status']) {
                            $status = '<span class="label label-success">Checked In</span>';
                          } else {
                            $status = '<span class="label label-danger">Checked Out</span>';
                          }

                if($row['status'] == 0){
                  $recheck = '<button class="btn btn-success btn-sm checkin btn-rounded" data-id="'.$row['tranid'].'"><i class="fa fa-sign-in"></i></button>';
                }else{
                  $recheck = '';
                }
                      echo "
                        <tr>
                          <td>" . date('M d, Y', strtotime($row['created_at'])) . "</td>
                          <td>".$row['transient_id']."</td>
                          <td>".$row['firstname']."</td>
                          <td>".$row['lastname']."</td>
                          <td>".$row['gender']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['contact']."</td>

                          <td>".$status."</td>
                          <td>
                            <button class='btn btn-warning btn-sm edit btn-rounded' data-id='".$row['tranid']."'><i class='fa fa-edit'></i></button>
                            <button class='btn btn-danger btn-sm delete btn-rounded' data-id='".$row['tranid']."'><i class='fa fa-trash'></i></button>
                          </td>
                          <td>
                          <center>
                          ".$recheck."
                          </center>
                            </td>
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
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.checkin', function(e){
    e.preventDefault();
    $('#checkin').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'transient_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.tranid').val(response.tranid);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_gender').val(response.gender);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact);

      $('#transient_id').val(response.transient_id);
      $('#checkin_firstname').val(response.firstname);
      $('#checkin_lastname').val(response.lastname);
      $('#checkin_gender').val(response.gender);
      $('#checkin_address').val(response.address);
      $('#checkin_contact').val(response.contact);

      
      $('.del_stu').html(response.firstname+' '+response.lastname);
    }
  });
}

</script>
</body>
</html>
