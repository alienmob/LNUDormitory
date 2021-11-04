<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Event Management</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Event Management
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Events</li>
          <li class="active text-white">Event Management</li>
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
                <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> Add Event</a>
                <a href="#cancel_clear" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded pull-right"><i class="fa fa-eraser"></i> Clear Cancelled Events</a>
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
                    <th>Actions</th>
                    <th>Option</th>
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

                      $cancel = "";
                      if($row['estat'] == $cancel AND $row['date'] > $date){
                        $can = '<button data-toggle="modal"  class="cancel btn btn-default btn-sm btn-rounded" data-id="' . $row['studid'] . '"><b>Cancel</b></button>';
                      }else{
                        $can = '';
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

                          <td>
                          <button data-toggle='modal'  class='edit btn btn-warning btn-sm btn-rounded' data-id='" . $row['studid'] . "'><i class='fa fa-edit'></i></button>
                          <button data-toggle='modal'  class='delete btn btn-danger btn-sm btn-rounded' data-id='" . $row['studid'] . "'><i class='fa fa-trash'></i></button> 
                          </td>

                          <td>
                          " . $can . "
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
    <?php include 'includes/event_modal.php'; ?>
    <?php include 'includes/event_cancel_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {


      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.cancel', function(e) {
        e.preventDefault();
        $('#cancel').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'event_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.studid').val(response.studid);
      $('#edit_event_category').val(response.event_category_id).html(response.event_name);
      $('#edit_description').val(response.description);
      $('#edit_location').val(response.location);
      $('#edit_date').val(response.date);
      $('#edit_time_start').val(response.time_start);
      $('#edit_time_end').val(response.time_end);
      
      $('#cancel_event_category').val(response.event_category_id).html(response.event_name);
      $('#cancel_description').val(response.description);
      $('#cancel_location').val(response.location);
      $('#cancel_date').val(response.date);
      $('#cancel_time_start').val(response.time_start);
      $('#cancel_time_end').val(response.time_end);

      $('.del_event').html(response.event_name);
      $('.del_event2').html(response.description);
    }
  });
}

// function getRow(id){
//   $.ajax({
//     type: 'POST',
//     url: 'eventcancel_row.php',
//     
//     dataType: 'json',
//     success: function(response){
//       $('.studid').val(response.studid);
//       $('#cancel_event_category').val(response.event_category_id).html(response.event_name);
//       $('#cancel_description').val(response.description);
//       $('#cancel_location').val(response.location);
//       $('#cancel_date').val(response.date);
//       $('#cancel_time_start').val(response.time_start);
//       $('#cancel_time_end').val(response.time_end);
//     }
//   });
// }


  </script>
</body>

</html>