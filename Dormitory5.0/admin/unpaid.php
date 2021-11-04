<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Unpaid Status</title>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-gradient-default">
      <!-- Content Header (Page header) -->
      <section class="content-header text-white">
        <h1>
          Unpaid Status
        </h1>
        <ol class="breadcrumb bg-default">
          <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Payment Records</li>
          <li class="active text-white">Unpaid Status</li>
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
                <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> Record Unpaid Student</a>

                <a href="#today" data-toggle="modal" class="btn btn-info btn-sm btn-rounded pull-right" style="margin:5px; margin-right:20px;"><i class="fa fa-bell"></i></a>
                
                <a href="#late" data-toggle="modal" class="btn btn-warning btn-sm btn-rounded pull-right" style="margin:5px;"><i class="fa fa-bell"></i></a>

                
              </div>

              <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <th class="hidden"></th>
                    <th>Date</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Privilege</th>
                    <th>Valid Through</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Receipt</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, unpaid.id AS ID, unpaid.status AS pstat FROM unpaid LEFT JOIN students ON students.student_id=unpaid.student_id ORDER BY deadline DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      $receipt = (!empty($row['receipt'])) ? '../img/'.$row['receipt'] : '../img/receipt.png';
                      if ($row['pstat']) {
                        $status = '<span class="label label-success">Paid</span>';
                      } else {
                        $status = '<span class="label label-danger">Unpaid</span>';
                      }

                      date_default_timezone_set('Asia/Manila');
	                    $date = date('Y-m-d');
                      if ($row['deadline'] < $date) {
                        $status = '<span class="label label-warning">LATE</span>';
                      }
                      if ($row['deadline'] == $date) {
                        $status = '<span class="label label-info">DEADLINE TODAY</span>';
                      }
                      
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>" . date('M d, Y', strtotime($row['date_unpaid'])) . "</td>
                          <td>" . $row['student_id'] . "</td>
                          <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                          <td>" . $row['privilege'] . "</td>
                          <td>" . date('M d, Y', strtotime($row['date_from'])) . ' - ' . date('M d, Y', strtotime($row['date_to'])) . "</td>
                          <td>" . $status . "</td>
                          <td>" . date('M d, Y', strtotime($row['deadline'])) . "</td>
                          <td>
                            <img src='".$receipt."' width='60px' height='60px'>
                            <a href=#upload_photo data-toggle='modal' class='pull-right receipt' data-id='".$row['ID']."'><span class='fa fa-eye'></span></a>
                          </td>
                          <td>
                          <center>
                          <button data-toggle='modal'  class='pay btn btn-success btn-sm btn-rounded' data-id='" . $row['ID'] . "'><i class='fa fa-check'></i></button>
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
    <?php include 'includes/pay_modal.php'; ?>
    
    <?php include 'includes/unpaid_modal.php'; ?>
    
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>


    $(document).on('click', '.pay', function(e) {
      e.preventDefault();
      var id = $(this).data();
      getRow(id.id);
      $('#pay').modal('show');


    });

    $(document).on('click', '.promissory', function(e) {
      e.preventDefault();
      var id = $(this).data();
      getRow(id.id);
      $('#promissory').modal('show');

    });


$(document).on('click', '.receipt', function(e){
e.preventDefault();
var id = $(this).data('id');
getRow(id);
});


    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'pay_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response) {
          console.log(response);
          $('.ID').val(response.id);
          $('#stud').val(response.id);
          $('#students').val(response.student_id);
          $('#validfrom').val(response.date_from);
          $('#validto').val(response.date_to);
          $('#name').val(response.firstname+' '+response.lastname);
          $('#pname').val(response.firstname+' '+response.lastname);
          $('#upload2').val(response.receipt);
          $('#upload').attr("src", response.receipt ? '../img/' + response.receipt : '../img/receipt.png');
          $('#display_img').attr("src", response.receipt ? '../img/' + response.receipt : '../img/receipt.png');
          $('.name_id').html(response.firstname+' '+response.lastname+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student ID:'+response.student_id);
          $('.res').html(response.date_from+'&nbsp; - &nbsp; '+response.date_to);
        }
      });
    }

    // $("body").on("click", ".restoreUserIcon", function(e){
    //         e.preventDefault();
    //         res_id = $(this).attr('student_id');

    //         Swal.fire({
    //             title: 'Please Wait!',
    //             html: 'Sending Email...',// add html attribute if you want or remove
    //             allowOutsideClick: false,
    //             onBeforeOpen: () => {
    //                 Swal.showLoading()
    //             },
    //         });
    //     });

      
    
  </script>
</body>

</html>