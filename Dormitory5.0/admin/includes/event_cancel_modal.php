<!-- cancel -->
<div class="modal fade" id="cancel">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Cancel This Event?</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="event_cancel.php">
              <input type="hidden" class="studid" name="id">
                <div class="form-group">
                    <label for="event_category" class="col-sm-3 control-label">Event Title</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="event_category" name="event_category" disabled>
                        <option value="" selected id="cancel_event_category">- Select Event title -</option>
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
                      <textarea class="form-control" name="description" id="cancel_description" placeholder="Enter Description of Event" disabled></textarea>
                    </div>
                </div>

                <div class="form-group">
                  	<label for="location" class="col-sm-3 control-label">Location</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="cancel_location" name="location" placeholder="Enter Location of Event" disabled>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="date" class="col-sm-3 control-label">Scheduled Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="cancel_date" name="date" disabled>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_start" class="col-sm-3 control-label">Start</label>

                  	<div class="col-sm-9">
                    	<input type="time" class="form-control" id="cancel_time_start" name="time_start" disabled>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_end" class="col-sm-3 control-label">End</label>

                  	<div class="col-sm-9">
                    	<input type="time" class="form-control" id="cancel_time_end" name="time_end" disabled>
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
            	<!-- <button type="submit" class="btn btn-danger btn-rounded" name="cancel"><i class="fa fa-check"></i> Cancel Event</button> -->
              <input type="submit" class="cancel-btn btn btn-danger btn-rounded" name="cancel" value="Cancel Event" />
            	</form>
          	</div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            $(function() {
                $(".cancel-btn").click(function() {
                    $(this).val('Please Wait...');
                });
            });
        </script>


<!-- Clear cancelled -->
<div class="modal fade" id="cancel_clear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Clear All Cancelled Events?</b></h4>
            </div>

              <form class="form-horizontal" method="POST" action="cancel_clear.php">

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-rounded" name="cancel_clear"><i class="fa fa-trash"></i> Clear</button>
              </form>
            </div>
        </div>
    </div>
</div>