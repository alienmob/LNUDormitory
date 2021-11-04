<?php include 'includes/session.php'; ?>
<?php
$catid = 0;
$where = '';
if (isset($_GET['floor_category'])) {
  $catid = $_GET['floor_category'];
  $where = 'WHERE rooms.floor_category_id = ' . $catid;
}

?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Room Management</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Room Management
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Facility</li>
          <li class="active text-white">Room Management</li>
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
                

                <div class="box-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Floor Category: </label>
                      <select class="form-control input-sm" id="select_category">
                        <option value="0">ALL</option>
                        <?php
                        $sql = "SELECT * FROM floor_category";
                        $query = $conn->query($sql);
                        while ($catrow = $query->fetch_assoc()) {
                          $selected = ($catid == $catrow['id']) ? " selected" : "";
                          echo "
                            <option value='" . $catrow['id'] . "' " . $selected . ">" . $catrow['floor_name'] . "</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>
                  </form>
                </div>
              
              
              </div>

              <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <th>Rooms</th>
                    <th><center>Maximum Occupancy</center></th>
                    <th>Status</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    <?php
                     $sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id LEFT JOIN room_category ON room_category.id=rooms.room_category_id $where";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      if ($row['status'] == 0) {
                        $status = '<span class="label label-success">Available</span>';
                        // by '. $row['occupants'] .' individual/s
                      } else {
                        $status = '<span class="label label-danger">Unavailable</span>';
                      }
                      if ($row['occupants'] == $row['occupancy']) {
                        $status = '<span class="label label-warning">Full</span>';
                      }
                      if ($row['occupancy'] == 0) {
                        $status = '<span class="label label-danger">Unavailable</span>';
                      }
                      $vacant = $row['occupancy'] - $row['occupants'];
                      echo "
                        <tr>
                          <td>" . $row['floor_name'] .'&nbsp;-&nbsp;'. $row['room_name'] . "</td>

                    <td><center>
                    <a href=#minus data-toggle='modal' class='pull-left minus' data-id='".$row['id']."'><span class='fa fa-minus'></span></a>
                    ". $row['occupancy'] ."
                    <a href=#add data-toggle='modal' class='pull-right add' data-id='".$row['id']."'><span class='fa fa-plus'></span></a>
                    </center></td>

                          <td>" . $status . "</td>
                          <td>
                            <button class='btn btn-primary btn-sm option btn-rounded' data-id='" . $row['id'] . "'><i class='fa fa-wrench'></i></button>
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
    <?php include 'includes/room_m_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {

      $('#select_category').change(function() {
        var value = $(this).val();
        if (value == 0) {
          window.location = 'room_m.php';
        } else {
          window.location = 'room_m.php?floor_category=' + value;
        }
      });

      $(document).on('click', '.option', function(e) {
        e.preventDefault();
        $('#option').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });


$(document).on('click', '.minus', function(e){
e.preventDefault();
var id = $(this).data('id');
getRow(id);
});
$(document).on('click', '.add', function(e){
e.preventDefault();
var id = $(this).data('id');
getRow(id);
});


    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'room_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.roomid').val(response.id);
          $('#room_select').val(response.id).html(response.floor_name + '&nbsp;-&nbsp;' + response.room_name);
          $('#room_select_m').val(response.id).html(response.floor_name + '&nbsp;-&nbsp;' + response.room_name);
          $('#option_m').val(response.id).html(response.floor_name + '&nbsp;-&nbsp;' + response.room_name);
          $('#stat').val(response.id).html(response.status);
        }
      });
    }
  </script>
</body>

</html>