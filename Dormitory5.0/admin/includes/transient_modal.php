<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Transient</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="transient_add.php">
             
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="gender" name="gender" required>
                        <option value="" selected>- Select Gender -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact No.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number" required>
                    </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-3 control-label">Room No.</label>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor" name="floor" required>
                        <option value="" selected>- Select Floor -</option>
                        <?php
                          $sql = "SELECT * FROM floor_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['floor_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    <div class="col-sm-4">
                      <select class="form-control" id="room" name="room" required>
                        <option value="" selected>- Select Room -</option>
                        <?php
                          $sql = "SELECT * FROM room_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                  	<label for="" class="col-sm-3 control-label">Check In</label>

                  	<div class="col-sm-4">
                    	<input type="date" class="form-control" id="date_in" name="date_in" required>
                  	</div>

                  	<div class="col-sm-3">
                    	<input type="time" class="form-control" id="time_in" name="time_in" required>
                  	</div>
    
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                  	<label for="" class="col-sm-3 control-label">Check Out</label>

                  	<div class="col-sm-4">
                    	<input type="date" class="form-control" id="date_out" name="date_out" required>
                  	</div>

                  	<div class="col-sm-3">
                    	<input type="time" class="form-control" id="time_out" name="time_out" required>
                  	</div>
    
                </div>
                </div>
                
               
                
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
              <h4 class="modal-title"><b>Edit Transient</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="transient_edit.php">
                <input type="hidden" class="tranid" name="id">

                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_gender" name="gender" required>
                        <option value="" selected>- Select -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_address" name="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact No.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact" required>
                    </div>
                </div>
            
               
               
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
              <form class="form-horizontal" method="POST" action="transient_delete.php">
                <input type="hidden" class="tranid" name="id">
                <div class="text-center">
                    <p>DELETE TRANSIENT</p>
                    <h2 class="del_stu bold"></h2>
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


<!--Re Check In -->
<div class="modal fade" id="checkin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Re-Check In Past Transient</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="transient_checkin.php">
                <input type="hidden" class="tranid" name="id">

                <div class="form-group">
                    <label for="transient_id" class="col-sm-3 control-label">Transient ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="transient_id" name="transient_id" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkin_firstname" name="firstname" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkin_lastname" name="lastname" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="checkin_gender" name="gender" disabled>
                        <option value="" selected>- Select -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkin_address" name="address" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact No.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkin_contact" name="contact" disabled>
                    </div>
                </div>
            
                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-3 control-label">Room No.</label>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor" name="floor" required>
                        <option value="" selected>- Select Floor -</option>
                        <?php
                          $sql = "SELECT * FROM floor_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['floor_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    <div class="col-sm-4">
                      <select class="form-control" id="room" name="room" required>
                        <option value="" selected>- Select Room -</option>
                        <?php
                          $sql = "SELECT * FROM room_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                  	<label for="" class="col-sm-3 control-label">Check In</label>

                  	<div class="col-sm-4">
                    	<input type="date" class="form-control" id="date_in" name="date_in" required>
                  	</div>

                  	<div class="col-sm-3">
                    	<input type="time" class="form-control" id="time_in" name="time_in" required>
                  	</div>
    
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                  	<label for="" class="col-sm-3 control-label">Check Out</label>

                  	<div class="col-sm-4">
                    	<input type="date" class="form-control" id="date_out" name="date_out" required>
                  	</div>

                  	<div class="col-sm-3">
                    	<input type="time" class="form-control" id="time_out" name="time_out" required>
                  	</div>
    
                </div>
                </div>
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-rounded" name="checkin"><i class="fa fa-sign-in"></i> Check In</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Check out -->
<div class="modal fade" id="checkout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Check Out Transient</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="transient_checkout.php">
                <input type="hidden" class="checkid" name="id">

                <div class="form-group">
                    <label for="transient_id" class="col-sm-3 control-label">Transient ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkout_transient_id" name="transient_id" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkout_firstname" name="firstname" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="checkout_lastname" name="lastname" disabled>
                    </div>
                </div>


                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-3 control-label">Room No.</label>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor" name="floor" required>
                        <option value="" selected id="checkout_floor">- Select Floor -</option>
                        <?php
                          $sql = "SELECT * FROM floor_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['floor_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    <div class="col-sm-4">
                      <select class="form-control" id="room" name="room" required>
                        <option value="" selected id="checkout_room">- Select Room -</option>
                        <?php
                          $sql = "SELECT * FROM room_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    </div>
                </div>



                <div class="form-group">
                <div class="form-row">

                  	<label for="" class="col-sm-3 control-label">Check In</label>

                  	<div class="col-sm-4">
                    	<input type="date" class="form-control" id="checkout_date_in" name="date_in" required>
                  	</div>

                  	<div class="col-sm-3">
                    	<input type="time" class="form-control" id="checkout_time_in" name="time_in" required>
                  	</div>
    
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                  	<label for="" class="col-sm-3 control-label">Check Out</label>

                  	<div class="col-sm-4">
                    	<input type="date" class="form-control" id="checkout_date_out" name="date_out" required>
                  	</div>

                  	<div class="col-sm-3">
                    	<input type="time" class="form-control" id="checkout_time_out" name="time_out" required>
                  	</div>
    
                </div>
                </div>
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-rounded" name="checkout"><i class="fa fa-sign-out"></i> Check Out</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Clear record checkout -->
<div class="modal fade" id="check_del">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Clear All Record in Check Out?</b></h4>
            </div>
            
              <form class="form-horizontal" method="POST" action="checkout_delete.php">

           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-rounded" name="check_del"><i class="fa fa-trash"></i> Clear</button>
              </form>
            </div>
        </div>
    </div>
</div>

     