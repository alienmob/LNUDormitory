
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper bg-gradient-default">
			<div class="container">

				<!-- Main content -->
				<section class="content">
				<<?php
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
					
							<div class="box">
							
								<div class="box-header with-border">
									<h3 class="box-title">Log Book Record</h3>
									
								</div>
								
								<!-- <div class="box-header with-border">
								<div class="input-group col-sm-3 pull-right">
				                <input type="text" class="form-control input-md" id="searchBox" placeholder="Search...">
				                <span class="input-group-btn">
				                    <button type="button" class="btn btn-primary btn-rounded btn-md"><i class="fa fa-search"></i> </button>
				                </span>
				            </div>
								</div> -->

								<div class="box-body">
				  				  <div class="table-responsive">
									<table class="table table-bordered table-striped">
										<thead>
											<th class="hidden"></th>
											<th>Student ID</th>
											<th>Name</th>					
											<th>Date</th>					
											<th>Time In</th>
											<th>Time Out</th>

										</thead>
										<tbody id="logbook">
										
										</tbody>
									</table>
								</div>
								</div>

							</div>

				</section>

			</div>
		</div>

		<?php include 'includes/footer.php'; ?>
		
	</div>

	<?php include 'includes/scripts.php'; ?>

</body>
<script type="text/javascript">
    $(document).ready(function(){
      function showData()
      { 
        $.ajax({
          url: 'includes/logbook_process.php',
          type: 'POST',
          dataType: 'html',
          success: function(result)
          {
            $('#logbook').html(result);
          },
          error: function()
          {
            alert("Failed to show the logs");
          }
        })
      }
      setInterval(function(){ showData(); }, 1500);
    });

  </script>
</html>