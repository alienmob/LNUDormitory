<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add an Event</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="event_add.php">
                <div class="form-group">
                    <label for="event_category" class="col-sm-3 control-label">Event Title</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="event_category" name="event_category" required>
                        <option value="" selected>- Select Event title -</option>
                        <?php
                          $sql = "SELECT * FROM event_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['event_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="description" id="description" placeholder="Enter Description of Event" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                  	<label for="location" class="col-sm-3 control-label">Location</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="location" name="location" placeholder="Enter Location of Event" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="date" class="col-sm-3 control-label">Scheduled Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="date" name="date" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_start" class="col-sm-3 control-label">Start</label>

                  	<div class="col-sm-9">
                    	<input type="time" class="form-control" id="time_start" name="time_start" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_end" class="col-sm-3 control-label">End</label>

                  	<div class="col-sm-9">
                    	<input type="time" class="form-control" id="time_end" name="time_end" required>
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
            	<!-- <button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-save"></i> Add</button> -->
              <input type="submit" class="submit-btn btn btn-success btn-rounded" name="add" value="Add" />
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



<!-- edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Edit Event</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="event_edit.php">
              <input type="hidden" class="studid" name="id">
                <div class="form-group">
                    <label for="event_category" class="col-sm-3 control-label">Event Title</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="event_category" name="event_category" required>
                        <option value="" selected id="edit_event_category">- Select Event title -</option>
                        <?php
                          $sql = "SELECT * FROM event_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['id']."'>".$row['event_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="description" id="edit_description" placeholder="Enter Description of Event" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                  	<label for="location" class="col-sm-3 control-label">Location</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_location" name="location" placeholder="Enter Location of Event" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="date" class="col-sm-3 control-label">Scheduled Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_date" name="date" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_start" class="col-sm-3 control-label">Start</label>

                  	<div class="col-sm-9">
                    	<input type="time" class="form-control" id="edit_time_start" name="time_start" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_end" class="col-sm-3 control-label">End</label>

                  	<div class="col-sm-9">
                    	<input type="time" class="form-control" id="edit_time_end" name="time_end" required>
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
              <form class="form-horizontal" method="POST" action="event_delete.php">
                <input type="hidden" class="studid" name="id">
                <div class="text-center">
                    <!-- <h2 id="del_event" class="bold"></h2>
                    <h2 id="del_event2" class="bold"></h2> -->
                    Event Title:<h2 class="del_event bold"></h2>
                    Description:<h3 class="del_event2 bold"></h3>
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



