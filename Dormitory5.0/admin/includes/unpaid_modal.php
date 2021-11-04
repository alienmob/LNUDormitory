<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Record Unpaid Students</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="unpaid_add.php">
          		  <!-- <div class="form-group">
                  	<label for="student_id" class="col-sm-3 control-label">Student ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student Number" required>
                  	</div>	
                </div> -->
				<!-- <span id="append-div"></span>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-primary btn-xs btn-rounded" id="append"><i class="fa fa-plus"></i> Student ID Field</button>
                    </div>
                </div> -->

                <div class="form-group">
                  	<label for="date_from" class="col-sm-4 control-label">Date From</label>

                  	<div class="col-sm-5">
                    	<input type="date" class="form-control" id="date_from" name="date_from" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="date_to" class="col-sm-4 control-label">Date To</label>

                  	<div class="col-sm-5">
                    	<input type="date" class="form-control" id="date_to" name="date_to" required>
                  	</div>
                </div>
				<hr>

				<div class="form-group">
                  	<label for="deadline" class="col-sm-4 control-label">Deadline of Payment</label>

                  	<div class="col-sm-5">
                    	<input type="date" class="form-control" id="deadline" name="deadline" required>
                  	</div>
                </div>

			
				

                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<!-- <button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-save"></i> Confirm</button> -->
				<input type="submit" class="submit-btn btn btn-success btn-rounded" name="add" value="Confirm" />
            	</form>
          	</div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            $(function() {
                $(".submit-btn").click(function() {
                    $(this).val('Please Wait...');
                });
            });
        </script>

<script>
	// $(document).on('click', '.add', function(e) {
    //   e.preventDefault();
    //   var id = $(this).data();
    //   getRow(id.id);
    //   Swal.fire({
    //             title: 'Please Wait!',
    //             html: 'Sending Email...',// add html attribute if you want or remove
    //             allowOutsideClick: false,
    //             onBeforeOpen: () => {
    //                 Swal.showLoading()
    //             },
    //         });

    // });


// 	$(document).on("click", ".add", function(e){
//             e.preventDefault();
//             var id = $(this).data();

// 			Swal.fire({
//                 title: 'Please Wait!',
//                 html: 'Sending Email...',// add html attribute if you want or remove
//                 allowOutsideClick: false,
//                 onBeforeOpen: () => {
//                     Swal.showLoading()
//                 },
//             }).then((result) => {
//   if (result.value) {
//       $.ajax({
//         url: 'assets/php/unpaid_add.php',
//         method: 'post',
//         data: { id: id },
//         success:function(response){
//             Swal.fire(
//       'Restored!',
//       'User Restored Successfully!',
//       'success'
//     )
//         }
//       });
    
//   }
// })
//         });
	</script>


<!-- Late -->
<div class="modal fade" id="late">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Late Unpaid Students</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="unpaid_late.php">
                <input type="hidden" class="late" name="id">
                <div class="text-center">
                   <h2>Send Email Notification to all late unpaid students?</h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			  <input type="submit" class="late-btn btn btn-success btn-rounded" name="late" value="Send" />
              </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            $(function() {
                $(".late-btn").click(function() {
                    $(this).val('Please Wait...');
                });
            });
        </script>


<!-- Today -->
<div class="modal fade" id="today">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deadline Today</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="unpaid_today.php">
                <input type="hidden" class="today" name="id">
                <div class="text-center">
                   <h2>Notify all unpaid students that the payment is deadline today.</h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			  <input type="submit" class="today-btn btn btn-success btn-rounded" name="today" value="Send" />
              </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            $(function() {
                $(".today-btn").click(function() {
                    $(this).val('Please Wait...');
                });
            });
        </script>
