
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Violation</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="violation_add.php">
              <div class="form-group">
                    <label for="student_id" class="col-sm-3 control-label">Student ID</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student Number" required>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="" class="col-sm-3 control-label">Date</label>
                  	<div class="col-sm-5">
                    	<input type="date" class="form-control" id="date" name="date" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="violation" class="col-sm-3 control-label">Violation</label>
                    <div class="col-sm-7">
                      <textarea name="violation" id="violation" class="form-control" placeholder="Specify Violation" rows="4" required></textarea>
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

<!-- View -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>View Student's Violation</b></h4>
            </div>
            <div class="modal-body">
              
              <form class="form-horizontal" method="POST" action="violation_view.php">
                <input type="hidden" class="studid" name="id">

                <div class="form-group">
                    <label for="students" class="col-sm-3 control-label">Student ID</label>

                    <div class="col-sm-8">
                      <text type="text" class="form-control" id="students" name="students" disabled></text>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-8">
                      <text type="text" class="form-control" id="name" name="name" disabled></text>
                    </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <label for="floor&room" class="col-sm-3 control-label">Room No.</label>

                    <div class="col-sm-4">
                      <select class="form-control" id="floor" name="floor" disabled>
                        <option value="" selected id="selfloor">- Select Floor -</option>
                        <?php
                          $sql = "SELECT * FROM floor_category";
                          $floor_query = $conn->query($sql);
                          while($floor_row = $floor_query->fetch_array()){
                            echo "
                              <option value='".$floor_row['id']."'>".$floor_row['floor_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    <div class="col-sm-4">
                      <select class="form-control" id="room" name="room" disabled>
                        <option value="" selected id="selroom">- Select Room -</option>
                        <?php
                          $sql = "SELECT * FROM room_category";
                          $room_query = $conn->query($sql);
                          while($room_row = $room_query->fetch_array()){
                            echo "
                              <option value='".$room_row['id']."'>".$room_row['room_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="course" class="col-sm-3 control-label">Course</label>
                    <div class="col-sm-8">
                      <textarea name="course" id="course" class="form-control" rows="2" disabled></textarea>
                    </div>
                </div>
<hr>
                <div class="form-group">
                  	<label for="view_date" class="col-sm-3 control-label">Date</label>
                  	<div class="col-sm-5">
                    	<input type="date" class="form-control" id="view_date" name="view_date" disabled>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="view_violation" class="col-sm-3 control-label">Violation</label>
                    <div class="col-sm-8">
                      <textarea name="view_violation" id="view_violation" class="form-control" rows="3" disabled></textarea>
                    </div>
                </div>
                
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
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
              <form class="form-horizontal" method="POST" action="violation_delete.php">
                <input type="hidden" class="studid" name="id">
                <div class="text-center">
                    <p>DELETE VIOLATION?</p>
                    <br>
                    Name:<h2 class="del_name bold"></h2>
                    Violation:<h3 class="del_vio bold"></h3>
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
