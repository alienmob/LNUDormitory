<?php include 'includes/session.php'; ?>
<?php
$catid = 0;
$where = '';
if (isset($_GET['category'])) {
  $catid = $_GET['category'];
  $where = 'WHERE equipments.category_id = ' . $catid;
}

?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Equipment List</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Equipment List
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Facility</li>
          <li class="active text-white">Equipment List</li>
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
                      <label>Category: </label>
                      <select class="form-control input-sm" id="select_category">
                        <option value="0">ALL</option>
                        <?php
                        $sql = "SELECT * FROM category";
                        $query = $conn->query($sql);
                        while ($catrow = $query->fetch_assoc()) {
                          $selected = ($catid == $catrow['id']) ? " selected" : "";
                          echo "
                            <option value='" . $catrow['id'] . "' " . $selected . ">" . $catrow['name'] . "</option>
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
                    <th>Name</th>  
                    <th>Code</th>
                    <th>Category</th>
                    <!-- <th>Serviceable Qty.</th>
                    <th>Unserviceable Qty.</th>
                    <th>Total Qty.</th> -->
                    <th>Available</th>
                    <th>Being Used</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, equipments.id AS equipid FROM equipments LEFT JOIN category ON category.id=equipments.category_id $where";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      if ($row['status']) {
                        $status = '<span class="label label-warning"></span>';
                      } else {
                        $status = '<span class="label label-success">Available</span>';
                      }
                      if ($row['quantity'] == 0) {
                        $status = '<span class="label label-danger">Unavailable</span>';
                      }
                      if ($row['quantity'] == 1) {
                        $status = '<span class="label label-warning">1 item left</span>';
                      }
                      echo "
                        <tr>
                          <td>" . $row['title'] . "</td>   
                          <td>" . $row['code'] . "</td>
                          <td>" . $row['name'] . "</td>
                          
                          <td>" . $row['quantity'] . "</td>
                          <td>" . $row['quantity_used'] . "</td>
                          <td>" . $status . "</td>
                          <td>
                            <button class='btn btn-warning btn-sm edit btn-rounded' data-id='" . $row['equipid'] . "'><i class='fa fa-edit'></i></button>
                            <button class='btn btn-danger btn-sm delete btn-rounded' data-id='" . $row['equipid'] . "'><i class='fa fa-trash'></i></button>
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
    <?php include 'includes/equip_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      $('#select_category').change(function() {
        var value = $(this).val();
        if (value == 0) {
          window.location = 'equipment.php';
        } else {
          window.location = 'equipment.php?category=' + value;
        }
      });

      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#edit').modal('show');
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

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'equip_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.equipid').val(response.equipid);
          $('#edit_code').val(response.code);
          $('#edit_title').val(response.title);
          $('#catselect').val(response.category_id).html(response.name);
          $('#edit_quantity').val(response.quantity);
          $('#edit_quantity_service').val(response.quantity_service);
          $('#edit_quantity_unservice').val(response.quantity_unservice);
          $('#edit_quantity_total').val(response.quantity_total);
          $('#del_book').html(response.title);
        }
      });
    }
  </script>
</body>

</html>