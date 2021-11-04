<!-- ADD QTY -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Increase Occupancy</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="room_m_add.php">
       
                <div class="form-group">
                    <label for="room" class="col-sm-4 control-label">Room</label>

                    <div class="col-sm-6">
                      <select class="form-control" id="room" name="room" required>
                        <option value="" selected id="room_select">- Select Room -</option>
                        <?php
                          $sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
                          LEFT JOIN room_category ON room_category.id=rooms.room_category_id";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['floor_name'].'&nbsp;-&nbsp;'.$row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
               
                <div class="form-group">
                  	<label for="increase" class="col-sm-4 control-label">Increase Occupancy by</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="increase" name="increase" placeholder="Enter Quantity" required>
                  	</div>
                </div>

                <hr>
                <div class="form-group">
                  	<label for="reason_add" class="col-sm-3 control-label">Reason for Increasing</label>

                  	<div class="col-sm-7">
                    	<textarea type="text" class="form-control" id="reason_add" name="reason_add" placeholder="Enter Reason" required></textarea>
                  	</div>
                </div>
                

               
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-plus"></i> Increase</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- SUB QTY -->
<div class="modal fade" id="minus">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Decrease Occupancy</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="room_m_minus.php">
       
                <div class="form-group">
                    <label for="room_m" class="col-sm-4 control-label">Room</label>

                    <div class="col-sm-6">
                      <select class="form-control" id="room_m" name="room_m" required>
                        <option value="" selected id="room_select_m">- Select Room -</option>
                        <?php
                          $sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
                          LEFT JOIN room_category ON room_category.id=rooms.room_category_id";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['floor_name'].'&nbsp;-&nbsp;'.$row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
               
                <div class="form-group">
                  	<label for="decrease" class="col-sm-4 control-label">Decrease Occupancy by</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="decrease" name="decrease" placeholder="Enter Quantity" required>
                  	</div>
                </div>
                
                <hr>
                <div class="form-group">
                  	<label for="reason_minus" class="col-sm-3 control-label">Reason for Decreasing</label>

                  	<div class="col-sm-7">
                    	<textarea type="text" class="form-control" id="reason_minus" name="reason_minus" placeholder="Enter Reason" required></textarea>
                  	</div>
                </div>
               
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="minus"><i class="fa fa-minus"></i> Decrease</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- OPTION -->
<div class="modal fade" id="option">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Modify Room Status</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="room_m_option.php">
       

              <!-- <div class="form-group">
                    <label for="stat" class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-9">
                    	

                              <text class="label label-danger" id="stat"></text>

                  	</div>
                </div> -->


                <div class="form-group">
                    <label for="room_option" class="col-sm-4 control-label">Room</label>

                    <div class="col-sm-6">
                      <select class="form-control" id="room_option" name="room_option" required>
                        <option value="" selected id="option_m">- Select Room -</option>
                        <?php
                          $sql = "SELECT *, rooms.id AS id FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
                          LEFT JOIN room_category ON room_category.id=rooms.room_category_id";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['floor_name'].'&nbsp;-&nbsp;'.$row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-4 control-label">Room Status</label>

                    <div class="col-sm-6">
                      <select class="form-control" id="status" name="status" required>
                        <option value="" selected>- Select Status -</option>
                        <option value="1">Available</option>
                        <option value="2">Unavailable</option>
                        
                        
                      </select>
                    </div>
                </div>
               <hr>
                <div class="form-group">
                  	<label for="reason" class="col-sm-3 control-label">Reason</label>

                  	<div class="col-sm-7">
                    	<textarea type="text" class="form-control" id="reason" name="reason" placeholder="Enter Reason" required></textarea>
                  	</div>
                </div>

               
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="option"><i class="fa fa-save"></i> Confirm</button>
            	</form>
          	</div>
        </div>
    </div>
</div>