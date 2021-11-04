<div class="modal fade" id="pay">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Confirm Payment?</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="pay_add.php">
          <!-- <input type="hidden" class="studid" id="studid" name="id"> -->
          <input type="hidden" class="stud" id="stud" name="stud">
          <div class="form-group">
            <label for="students" class="col-sm-3 control-label">Student ID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control students" id="students" name="students" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control name" id="name" name="name" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="validfrom" class="col-sm-3 control-label">Valid From</label>
            <div class="col-sm-9">
              <input type="date" class="form-control validfrom" id="validfrom" name="validfrom" required>
            </div>
          </div>
          <div class="form-group">
            <label for="validto" class="col-sm-3 control-label">Valid To</label>
            <div class="col-sm-9">
              <input type="date" class="form-control validto" id="validto" name="validto" required>
            </div>
          </div>
          <div class="form-group">
            <label for="upload2" class="col-sm-3 control-label">Receipt</label>
            <div class="col-sm-9">
              <input type="text" class="form-control upload2" id="upload2" name="upload2">
            </div>

            

          </div>
          <div class="col-md-12">
          <img src="" id="upload" width="540px" height="600px" style="border: 2px solid;" alt="Image Here">
          <hr>
          </div>
          
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-rounded" name="pay"><i class="fa fa-check"></i> Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- promissory -->

<!-- <div class="modal fade" id="promissory">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Mark as Promissory?</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="promissory_add.php">
          <input type="hidden" class="studid" id="studid" name="id">
          <div class="form-group">
            <label for="student_id" class="col-sm-3 control-label">Student ID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control student_id" id="student_id" name="student_id" required>
            </div>
          </div>
          <div class="form-group">
            <label for="pname" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control pname" id="pname" name="pname" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="validfrom" class="col-sm-3 control-label">Valid From</label>
            <div class="col-sm-9">
              <input type="date" class="form-control validfrom" id="validfrom" name="validfrom" required>
            </div>
          </div>
          <div class="form-group">
            <label for="validto" class="col-sm-3 control-label">Valid To</label>
            <div class="col-sm-9">
              <input type="date" class="form-control validto" id="validto" name="validto" required>
            </div>
          </div>
          <div class="form-group">
                    <label for="pnote" class="col-sm-3 control-label">Promissory Note</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="pnote" id="pnote" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deadline" class="col-sm-3 control-label">Deadline</label>

                    <div class="col-sm-9">
                    <input type="date" class="form-control deadline" id="deadline" name="deadline" required>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-rounded" name="promissory"><i class="fa fa-check"></i> Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div> -->



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