<!-- <div class="modal fade" id="infomodal">
  <div class="modal-dialog">
      <div class="modal-content col-sm-9 col-sm-offset-1 bg-gradient-default">
        <br>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-body bg-gradient-default">
         <div class="col-sm-10">
           <h4 class="text-white" id="eventtitle"></h4>
           <p class="text-white" id="eventdescription"></p>
           <p class="text-white" id="eventlocation"></p>
           <p class="text-white" id="eventdate"></p>
           <p class="text-white" id="eventstart"></p>
           <p class="text-white" id="eventend"></p>
           <p class="text-white" id="status"></p>
         </div>
       </div>
    </div>
  </div>
</div> -->


<div class="modal fade" id="infomodal">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Event</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal">

                <div class="form-group">
                    <label for="eventtitle" class="col-sm-3 control-label">Event Title</label>
                      <div class="col-sm-9">
                    	<text type="text" class="form-control" id="eventtitle" ></text>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="eventdescription" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="eventdescription" rows="2"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="eventlocation" class="col-sm-3 control-label">Location</label>
                      <div class="col-sm-9">
                    	<text type="text" class="form-control" id="eventlocation" ></text>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="eventdate" class="col-sm-3 control-label">Scheduled Date</label>
                      <div class="col-sm-9">
                    	<date type="date" class="form-control" id="eventdate" ></date>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="eventstart" class="col-sm-3 control-label">Start</label>
                      <div class="col-sm-9">
                    	<time type="time" class="form-control" id="eventstart" ></time>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="eventend" class="col-sm-3 control-label">End</label>
                      <div class="col-sm-9">
                    	<time type="time" class="form-control" id="eventend" ></time>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="eventstatus" class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-9">
                    	<text class="label label-danger" id="eventstatus" ></text>
                  	</div>
                </div>
          	</div>
        </div>
    </div>
</div>
