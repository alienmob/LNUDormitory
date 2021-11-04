<!-- Delete -->
<div class="modal fade" id="prom_del">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Clear All Paid Status?</b></h4>
            </div>
            
              <form class="form-horizontal" method="POST" action="prom_delete.php">

           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-rounded" name="prom_del"><i class="fa fa-trash"></i> Clear</button>
              </form>
            </div>
        </div>
    </div>
</div>