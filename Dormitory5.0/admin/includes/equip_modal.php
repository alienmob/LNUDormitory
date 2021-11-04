<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add New Dorm Equipments</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="equip_add.php">
          		  <!-- <div class="form-group">
                  	<label for="code" class="col-sm-3 control-label">Equipment Code</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="code" name="code" required>
                  	</div>
                </div> -->
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Equipment Name</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="title" id="title" placeholder="Enter Equipment Name" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category" id="category" required>
                        <option value="" selected>- Select Equipment Category -</option>
                        <?php
                          $sql = "SELECT * FROM category";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['id']."'>".$crow['name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="quantity_service" class="col-sm-3 control-label">Qty. Serviceable</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_service" name="quantity_service" placeholder="Enter Serviceable Quantity" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="quantity_unservice" class="col-sm-3 control-label">Qty. Unserviceable</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_unservice" name="quantity_unservice" placeholder="Enter Unserviceable Quantity" required>
                  	</div>
                </div>

                <!-- <div class="form-group">
                  	<label for="quantity_total" class="col-sm-3 control-label">Total Qty.</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_total" name="quantity_total" placeholder="Enter Total Quantity" required>
                  	</div>
                </div> -->

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-save"></i> Add</button>
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
            	<form class="form-horizontal" method="POST" action="equip_edit.php">
            		<input type="hidden" class="equipid" name="id">
                <!-- <div class="form-group">
                    <label for="edit_code" class="col-sm-3 control-label">Equipment Code</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_code" name="code">
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="edit_title" class="col-sm-3 control-label">Equipment Name</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="title" id="edit_title"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category" id="category">
                        <option value="" selected id="catselect"></option>
                        <?php
                          $sql = "SELECT * FROM category";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "
                              <option value='".$crow['id']."'>".$crow['name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <!-- <div class="form-group">
                  	<label for="edit_quantity_total" class="col-sm-3 control-label">Total Quantity</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_quantity_total" name="quantity_total" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="edit_quantity_unservice" class="col-sm-3 control-label">Qty. Unserviceable</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_quantity_unservice" name="quantity_unservice" required>
                  	</div>
                </div> -->

                <!-- <div class="form-group">
                  	<label for="edit_quantity_total" class="col-sm-3 control-label">Total Qty.</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_quantity_total" name="quantity_total" required>
                  	</div>
                </div> -->

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-warning btn-rounded" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="equip_delete.php">
            		<input type="hidden" class="equipid" name="id">
            		<div class="text-center">
	                	<p>DELETE EQUIPMENT</p>
	                	<h2 id="del_book" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-rounded" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



