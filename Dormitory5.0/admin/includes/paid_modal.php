<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Record Payment</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="paid_add.php">
          		  <div class="form-group">
                  	<label for="student_id" class="col-sm-3 control-label">Student ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student Number" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="date_from" class="col-sm-3 control-label">Date From</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="date_from" name="date_from" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="date_to" class="col-sm-3 control-label">Date To</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="date_to" name="date_to" required>
                  	</div>
                </div>
				

                <!-- <span id="append-div"></span>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-primary btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Equipment Field</button>
                    </div>
                </div> -->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-check"></i> Confirm</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- View -->

<div class="modal fade" id="view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>View</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">

          <input type="hidden" class="stud" name="id">
          <div class="form-group">
            <label for="stud_id" class="col-sm-3 control-label">Student ID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control stud_id" id="stud_id" name="stud_id" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control name" id="name" name="name" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="validfrom" class="col-sm-3 control-label">Valid From</label>
            <div class="col-sm-9">
              <input type="date" class="form-control validfrom" id="validfrom" name="validfrom" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="validto" class="col-sm-3 control-label">Valid To</label>
            <div class="col-sm-9">
              <input type="date" class="form-control validto" id="validto" name="validto" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="upload2" class="col-sm-3 control-label">Receipt</label>
            <div class="col-sm-9">
              <input type="text" class="form-control upload2" id="upload2" name="upload2" disabled>
            </div>

            

          </div>
          <div class="col-md-12">
          <img src="" id="upload" width="540px" height="600px" style="border: 2px solid;" alt="Image Here">
          <hr>
          </div>
          
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-rounded pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </form>
      </div>
    </div>
  </div>
</div>