


<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Request to Borrow Equipment</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="borrow_add.php">

        <div class="form-group">
            <label for="code" class="col-sm-3 control-label">Equipment Name</label>

            <div class="col-sm-9">
              <select class="form-control" id="code" name="code[]" required>
                <option value="" selected>- Select -</option>
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
                    <label for="note" class="col-sm-3 control-label">Request Note</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="note" id="note" placeholder="Enter Your Request Note here..." required></textarea>
                    </div>
                </div>
				

                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-rounded" name="add"><i class="fa fa-save"></i> Confirm</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

