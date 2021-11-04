<!-- Delete -->
<div class="modal fade" id="pend_del">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Clear All Approved Requests?</b></h4>
            </div>
            
              <form class="form-horizontal" method="POST" action="pending_delete.php">

           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-rounded" name="pend_del"><i class="fa fa-trash"></i> Clear</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Decline -->
<div class="modal fade" id="dec_del">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Clear All Declined Requests?</b></h4>
            </div>
            
              <form class="form-horizontal" method="POST" action="pending_dec.php">

           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-rounded" name="dec_del"><i class="fa fa-trash"></i> Clear</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- approve -->
<div class="modal fade" id="approve">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Approve Pending Request?</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="borrow_add.php">
        <input type="hidden" class="stud" name="id">
          <div class="form-group">
            <label for="student" class="col-sm-3 control-label">Student ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_student" name="student" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_name" name="name" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="code" class="col-sm-3 control-label">Equipment Name</label>

            <div class="col-sm-9">
              <select class="form-control" id="code" name="code[]" required>
                <option value="" selected id="selcode2">- Select -</option>
                <?php
                $sql = "SELECT * FROM equipments";
                $query = $conn->query($sql);
                while ($row = $query->fetch_array()) {
                  echo "
                              <option value='" . $row['code'] . "'>" . $row['title'] . "</option>
                            ";
                }
                ?>
              </select>
            </div>
          </div>

          <hr>
                <div class="form-group">
                    <label for="feedback" class="col-sm-3 control-label">Approval Note</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="feedback" id="feedback" placeholder="Enter Your Note here..." rows="3" required></textarea>
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
        <button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-check"></i> Approve</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- decline -->
<div class="modal fade" id="decline">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Decline Pending Request?</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="pending_decline.php">
        <input type="hidden" class="stud" name="id">
          <div class="form-group">
            <label for="student" class="col-sm-3 control-label">Student ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="decline_student" name="student" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="decline_name" name="name" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="code" class="col-sm-3 control-label">Equipment Name</label>

            <div class="col-sm-9">
              <select class="form-control" id="code" name="code[]" required>
                <option value="" selected id="decode2">- Select -</option>
                <?php
                $sql = "SELECT * FROM equipments";
                $query = $conn->query($sql);
                while ($row = $query->fetch_array()) {
                  echo "
                              <option value='" . $row['code'] . "'>" . $row['title'] . "</option>
                            ";
                }
                ?>
              </select>
            </div>
          </div>

          <hr>
                <div class="form-group">
                    <label for="decline" class="col-sm-3 control-label">Declinal Note</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="decline" id="decline" placeholder="Enter Your Note here..." rows="3" required></textarea>
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
        <button type="submit" class="btn btn-danger btn-rounded" name="add"><i class="fa fa-times"></i> Decline</button>
        </form>
      </div>
    </div>
  </div>
</div>