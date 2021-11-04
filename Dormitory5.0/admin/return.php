<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Returned Equipments</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Returned Equipments
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Transaction</li>
          <li class="active text-white">Returned</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
      <?php
        if (isset($_SESSION['error'])) {


              foreach ($_SESSION['error'] as $error) {
                echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$error."')</script>';";
              }
              
            

          unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {
          // echo "
          //   <div class='alert alert-success alert-dismissible'>
          //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //     <h4><i class='icon fa fa-check'></i> Success!</h4>
          //     " . $_SESSION['success'] . "
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
                <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> Return</a>
              </div> -->
              <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <th class="hidden"></th>
                    <th>Date</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Equipment Code</th>
                    <th>Equipment Name</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, students.student_id AS stud FROM returns LEFT JOIN students ON students.student_id = returns.student_id LEFT JOIN equipments ON equipments.id = returns.equipment_id ORDER BY date_return DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      if ($row['status']) {
                        $status = '<span class="label label-danger">Borrowed</span>';
                      } else {
                        $status = '<span class="label label-success">Returned</span>';
                      }
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>" . date('M d, Y', strtotime($row['date_return'])) . "</td>
                          <td>" . $row['stud'] . "</td>
                          <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                          <td>" . $row['code'] . "</td>
                          <td>" . $row['title'] . "</td>
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
          </div>
        </div>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/return_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      $(document).on('click', '#append', function(e) {
        e.preventDefault();
        $('#append-div').append(
          '<div class="form-group"><label for="" class="col-sm-3 control-label">Equipment Code</label><div class="col-sm-9"><input type="text" class="form-control" name="code[]"></div></div>'
        );
      });
    });
  </script>
</body>

</html>