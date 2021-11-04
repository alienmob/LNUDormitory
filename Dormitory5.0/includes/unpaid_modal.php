<!-- Update Photo -->
<div class="modal fade" id="upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span>Upload Receipt</span></b></h4>
            </div>
            <div class="modal-body">


              <form class="form-horizontal" method="POST" action="receipt_upload.php" enctype="multipart/form-data">
                <input type="hidden" class="studid" id="studid" name="studid">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-rounded" name="upload"><i class="fa fa-upload"></i> Upload</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- View Photo -->
<div class="modal fade" id="upload_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name_id"></span></b></h4>
            </div>
            <div class="modal-body">
            <h4><b><span class="res"></span></b></h4>

<div class="col-md-12">
   <img src="" id="display_img" width="540px" height="700px" style="border: 2px solid;" alt="Image Here">
   <hr>
  </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>