<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Time Out Log</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="timeout_add.php">


                <div class="form-group">
                    <label for="note" class="col-sm-3 control-label">Time Out Note</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="note" id="note" placeholder="Enter Your Note here..." required></textarea>
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
        <button type="submit" class="btn btn-danger btn-rounded" name="add"><i class="fa fa-sign-out"></i> Time Out</button>
        </form>
      </div>
    </div>
  </div>
</div>