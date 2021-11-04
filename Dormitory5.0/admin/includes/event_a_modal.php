<div class="modal fade" id="attendance">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Send Attendance Link</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="event_a.php">
              <input type="hidden" class="studid" name="id">

              <div class="form-group">
                    <label for="event" class="col-sm-3 control-label">Event Title</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="event" name="event" required>
                        <option value="" selected >- Select Event -</option>
                        <?php
                       
                          $sql = "SELECT *, event.id AS eid FROM `event` LEFT JOIN event_category 
                          ON event_category.id=event.event_category_id WHERE status = ''";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_array()){
                            echo "
                              <option value='".$row['eid']."'>".$row['event_name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="e_attendance" class="col-sm-3 control-label">Attendance Link</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="e_attendance" id="e_attendance" placeholder="Enter Attendance Link" required></textarea>
                    </div>
                </div>

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="attendance"><i class="fa fa-paper-plane"></i> Send</button>
            	</form>
          	</div>
        </div>
    </div>
</div>