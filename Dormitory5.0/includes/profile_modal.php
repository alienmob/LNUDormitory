<?php
	$Write="<?php $" . "cardid=''; " . "echo $" . "cardid;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Profile</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                <!-- <input type="hidden" class="studid" name="id"> -->
                <div class="form-group">
                    <label for="student_id" class="col-sm-3 control-label">Student ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $student['student_id']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" minlength="8" value="<?php echo $student['password']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $student['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $student['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="address" name="address" value="<?php echo $student['address']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact No.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $student['contact']; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="id" class="col-sm-3 control-label">RFID:</label>
                    <div class="col-sm-6">
                      <input name="id" id="rfid" class="form-control" placeholder=""></input>
                    </div>
                    <div class="col-sm-3">
                      <a class="btn btn-primary btn-block btn-sm" data-toggle="collapse" data-target="#newidmodal">Scan</a>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label for="getUID" class="col-sm-3 control-label">RFID:</label>
                    <div class="col-sm-6">
                      <textarea name="getUID" id="getUID" class="form-control" placeholder="Please Scan your Card / Key Chain to display ID" rows="2" required></textarea>
                    </div>
                </div> -->
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Input current password to save changes" required>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-rounded" name="save"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

