<!-- <li class='dropdown order-1'>
                    <button type='button' id='dropdownMenu1' data-toggle='dropdown' class='btn btn-outline-secondary dropdown-toggle'>Login <span class='caret'></span></button>
                    <ul class='dropdown-menu dropdown-menu-right mt-2'>
                       <li class='px-3 py-2'>
                       <form method='POST' action='login.php'>
                                <div class='form-group'>
                                    <input id='student' name='student' placeholder='Student ID' class='form-control form-control-sm' type='text' required>
                                </div>
                                <div class='form-group'>
                                    <input id='password' name='password' placeholder='Password' class='form-control form-control-sm' type='text' required>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-warning btn-block' name='login'>Login</button>
                                </div>
                                <div class='form-group text-center'>
                                    <small><a href='#' data-toggle='modal' data-target='#modalPassword'>Forgot password?</a></small>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li> -->
 
<header class="main-header">
  <nav class="navbar navbar-static-top bg-gradient-warning2">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"><i class="fa fa-building" aria-hidden="true"></i><b>LNU</b>|Dormitory</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

     
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li><a href='admin/index.php'> <strong>Admin</strong></a></li>
              <li><a href='login_main.php'> <strong>Students</strong></a></li>
              

        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>


<?php include 'includes/profile_modal.php'; ?>


<!-- <script>

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'profile_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.studid').val(response.studid);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_gender').val(response.gender);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact);
      $('#selroom').val(response.room_id);
      $('#selroom').html(response.description);
      $('#selcourse').val(response.course_id);
      $('#selcourse').html(response.code);
    }
  });
}
	</script> -->