<?php include 'includes/session.php'; ?>
<?php
if (!isset($_SESSION['student']) || trim($_SESSION['student']) == '') {
	header('index.php');
}

$stuid = $_SESSION['student'];



?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar2.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Violations Record
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
    <style>
.fc-event-main {
	cursor: pointer !important;
}
</style>
<?php
        if(isset($_SESSION['error'])){
        //   echo "
        //     <div class='alert alert-danger alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-warning'></i> Error!</h4>
        //       ".$_SESSION['error']."
        //     </div>
			
        //   ";
		echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['error']."')</script>';";
          unset($_SESSION['error']);
        }

        if(isset($_SESSION['email_error'])){
        //   echo "
        //     <div class='alert alert-danger alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-warning'></i> Error!</h4>
        //       ".$_SESSION['email_error']."
        //     </div>
        //   ";
		  echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['email_error']."')</script>';";
          unset($_SESSION['email_error']);
        }

        if(isset($_SESSION['reset_success'])){
        //   echo "
        //     <div class='alert alert-success alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-check'></i> Success!</h4>
        //       ".$_SESSION['reset_success']."
        //     </div>
        //   ";
		echo "'<script type='text/javascript'>toastr.success('Success!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['reset_success']."')</script>';";
          unset($_SESSION['reset_success']);
        }

        if(isset($_SESSION['success'])){
        //   echo "
        //     <div class='alert alert-success alert-dismissible'>
        //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //       <h4><i class='icon fa fa-check'></i> Success!</h4>
        //       ".$_SESSION['success']."
        //     </div>
        //   ";
		echo "'<script type='text/javascript'>toastr.success('Success!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['success']."')</script>';";
          unset($_SESSION['success']);
        }
      ?>
      <br>
      
      <div class="box">
							<!-- <div class="box-header with-border">
									<a href="#promissory" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded"><i class="fa fa-plus"></i> Promissory</a>
								</div> -->
                <div class="box-header with-border">
                    <h3 class="box-title">List of Violations</h3>
                    
                </div>
                

                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example">
                <thead>
                    <th>Date</th>
                    <th>Violation</th>
					
                    </thead>
                    <tbody>
                    <?php
                     $sql = "SELECT * FROM violations WHERE student_id = '$stuid' ORDER BY date DESC";

                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                     
                      echo "
                        <tr>
                          <td>" . date('M d, Y | h:ia', strtotime($row['date'])) . "</td>
                          <td>" . $row['violation'] . "</td>
                          
                        </tr>
                      ";
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>




</section>
		</div>
    <?php include 'includes/violation_modal.php'; ?>
</div>
  
	<?php include 'includes/scripts.php'; ?>
	<script>
$(function(){
  $(document).on('click', '.upload', function(e){
    e.preventDefault();
    $('#upload').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});


function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'violation_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response) {
          console.log(response);
          $('.ID').val(response.id);
          $('#studid').val(response.id);
          $('#display_img').attr("src", response.receipt ? 'img/' + response.receipt : 'img/receipt.png');
          $('.name_id').html(response.firstname+' '+response.lastname+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student ID:'+response.student_id);
          $('.res').html(response.date_from+'&nbsp; - &nbsp; '+response.date_to);
        }
      });
    }

</script>
</body>

</html>