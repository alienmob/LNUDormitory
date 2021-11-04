<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add New Log</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="log_add.php">
          		  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">First Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Last Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="status" id="status" required>
                        <option value="" selected>- Select -</option>
                        <option value="IN">IN</option>
                        <option value="OUT">OUT</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reason" class="col-sm-3 control-label">Reason</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="reason" id="reason"></textarea>
                    </div>
                </div>

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-rounded" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Edit Equipment</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="log_add.php">
          		  <div class="form-group">
                  	<label for="edit_firstname" class="col-sm-3 control-label">First Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_lastname" class="col-sm-3 control-label">Last Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="edit_status" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="status" id="edit_status" required>
                        <option value="" selected>- Select -</option>
                        <option value="IN" selected>IN</option>
                        <option value="OUT" selected>OUT</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_reason" class="col-sm-3 control-label">Reason</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="reason" id="edit_reason"></textarea>
                    </div>
                </div>

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



     