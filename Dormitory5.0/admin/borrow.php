<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Borrowed Equipments</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Borrowed Equipments
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Transaction</li>
          <li class="active text-white">Borrowed</li>
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
                <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> Borrow</a>
              </div> -->
              <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    
                    <th>Date</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Equipment Code</th>
                    <th>Equipment Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *,borrow.student_id AS stu, borrow.id AS stud, borrow.status AS barstat FROM borrow LEFT JOIN students ON students.student_id=borrow.student_id LEFT JOIN equipments ON equipments.id=borrow.equipment_id  ORDER BY date_borrow DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      if ($row['barstat']) {
                        $status = '<span class="label label-success">Returned</span>';
                      } else {
                        $status = '<span class="label label-danger">Not Returned</span>';
                      }
                      echo "
                        <tr>
                          
                          <td>" . date('M d, Y', strtotime($row['date_borrow'])) . "</td>
                          <td>" . $row['stu'] . "</td>
                          <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td> 
                          <td>" . $row['code'] . "</td>
                          <td>" . $row['title'] . "</td>
                          <td>" . $status . "</td>
                          <td>
                          <button data-toggle='modal'  class='return btn btn-primary btn-sm btn-rounded' data-id='" . $row['stud'] . "'><i class='fa fa-mail-reply'></i></button>
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
    <?php include 'includes/borrow_modal.php'; ?>
    <?php include 'includes/return_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>


    $(function(){
  $(document).on('click', '.return', function(e){
    e.preventDefault();
    $('#return').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'return_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.stud').val(response.stud);
      $('#edit_student').val(response.student_id);
      $('#edit_name').val(response.firstname+' '+response.lastname);
      $('#selcode2').val(response.code).html(response.title);
    
    }
  });
}
  </script>
</body>

</html>