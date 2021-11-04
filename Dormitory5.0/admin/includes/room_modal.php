<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Room</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="room_add.php">
                
                <div class="form-group">
                    <label for="room" class="col-sm-3 control-label">Room Number</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="room" name="room" placeholder="Enter Room Number" required>
                    </div>
                </div>


                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor_category" name="floor_category" required>
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
                      <select class="form-control" id="room_category" name="room_category" required>
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
                    <label for="occupancy" class="col-sm-3 control-label">Max. Occupancy</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="occupancy" name="occupancy" placeholder="Enter Maximum Occupancy" required>
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
              <h4 class="modal-title"><b>Edit Room</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="room_edit.php">
                <input type="hidden" class="roomid" name="id">
                <div class="form-group">
                    <label for="edit_room" class="col-sm-3 control-label">Room Number</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_room" name="room" required>
                    </div>
                </div>


                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor_category" name="floor_category" required>
                        <option value="" selected id="catselect">- Select Floor -</option>
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
                      <select class="form-control" id="room_category" name="room_category" required>
                        <option value="" selected id="catselect2">- Select Room -</option>
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

                <!-- <div class="form-group">
                    <label for="edit_occupancy" class="col-sm-3 control-label">Max. Occupancy</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_occupancy" name="occupancy" required>
                    </div>
                </div> -->


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-warning btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
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
              <form class="form-horizontal" method="POST" action="room_delete.php">
                <input type="hidden" class="roomid" name="id">
                <div class="text-center">
                    <p>DELETE ROOM</p>
                    <h2 class="del_room bold"></h2>
                    <h2 class="del_room2 bold"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


     