<div class="modal fade" id="backup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Back Up Database</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="includes/database_backup.php">
            
                <div class="form-group">
                    <label for="code" class="col-sm-3 control-label">Host</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="server" name="server" placeholder="Enter Server Name EX: localhost" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code" class="col-sm-3 control-label">DB Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Database Username EX: root" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code" class="col-sm-3 control-label">DB Password</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Enter Database Password">
                    </div>
                </div>

                    <div class="form-group">
                    <label for="code" class="col-sm-3 control-label">DB Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dbname" name="dbname" placeholder="Enter Database Name" required>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-rounded" name="backupnow"><i class="fa fa-save"></i> Initiate Backup</button>
              </form>
            </div>
        </div>
    </div>
</div>