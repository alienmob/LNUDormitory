<!-- ADD QTY -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Quantity of New Equipment</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="equip_add_u.php">
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
                <!-- <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category" id="category" required>
                        <option value="" selected>- Select Equipment Category -</option>
                        <?php
                          // $sql = "SELECT * FROM category";
                          // $query = $conn->query($sql);
                          // while($crow = $query->fetch_assoc()){
                          //   echo "
                          //     <option value='".$crow['id']."'>".$crow['name']."</option>
                          //   ";
                          // }
                        ?>
                      </select>
                    </div>
                </div> -->
                <div class="form-group">
                  	<label for="quantity_service" class="col-sm-3 control-label">New Stock</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_service" name="quantity_service" placeholder="Enter Quantity" required>
                  	</div>
                </div>

                <!-- <div class="form-group">
                  	<label for="quantity_unservice" class="col-sm-3 control-label">Qty. Unserviceable</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_unservice" name="quantity_unservice" placeholder="Enter Unserviceable Quantity" required>
                  	</div>
                </div> -->

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



<!-- SUB QTY -->
<div class="modal fade" id="sub">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Quantity of New Unserviceable Equipment</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="equip_sub_u.php">
          		  <!-- <div class="form-group">
                  	<label for="code" class="col-sm-3 control-label">Equipment Code</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="code" name="code" required>
                  	</div>
                </div> -->
                <div class="form-group">
                    <label for="title2" class="col-sm-3 control-label">Equipment Name</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="title2" id="title2" placeholder="Enter Equipment Name" required></textarea>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category" id="category" required>
                        <option value="" selected>- Select Equipment Category -</option>
                        <?php
                          // $sql = "SELECT * FROM category";
                          // $query = $conn->query($sql);
                          // while($crow = $query->fetch_assoc()){
                          //   echo "
                          //     <option value='".$crow['id']."'>".$crow['name']."</option>
                          //   ";
                          // }
                        ?>
                      </select>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                  	<label for="quantity_service" class="col-sm-3 control-label">Quantity of New Stock of Equipment</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_service" name="quantity_service" placeholder="Enter New Stock Quantity" required>
                  	</div>
                </div> -->

                <div class="form-group">
                  	<label for="quantity_unservice" class="col-sm-3 control-label">New Unusable Equipment</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity_unservice" name="quantity_unservice" placeholder="Enter Quantity" required>
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
            	<button type="submit" class="btn btn-primary btn-rounded" name="sub"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>