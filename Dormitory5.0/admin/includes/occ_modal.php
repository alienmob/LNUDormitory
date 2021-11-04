<div class="modal fade" id="view_occ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>List of Occupied Students</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="view_occ.php">
                <input type="hidden" class="roomid" name="id">


                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-2 control-label">Category</label>

                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="room" name="room" required>
                    </div>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor" name="floor" required>
                        <option value="" selected id="floor_sel">- Select Floor -</option>
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
                        <option value="" selected id="room_sel">- Select Room -</option>
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