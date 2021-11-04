<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Return Equipment</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="return_add.php">
          <div class="form-group">
            <label for="student" class="col-sm-3 control-label">Student ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student" name="student" placeholder="Enter Student Number" required>
            </div>
          </div>
          <div class="form-group">
            <label for="code" class="col-sm-3 control-label">Equipment Name</label>

            <div class="col-sm-9">
              <select class="form-control" id="code" name="code[]" required>
                <option value="" selected>- Select Equipment Name -</option>
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
          <!-- <span id="append-div"></span>
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Equipment Field</button>
            </div>
          </div> -->
      </div>
      <div class="modal-footer bg-default">
        <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-check"></i> Return</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- return -->
<div class="modal fade" id="return">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Return Equipment</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="return_add.php">
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
          <!-- <span id="append-div"></span>
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Equipment Field</button>
            </div>
          </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-check"></i> Return</button>
        </form>
      </div>
    </div>
  </div>
</div>