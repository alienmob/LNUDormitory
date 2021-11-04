<?php include 'includes/session.php'; ?>
<?php
$catid = 0;
$where = '';
if (isset($_GET['rooms'])) {
  $catid = $_GET['rooms'];
  $where = 'WHERE students.actualroom_id = ' . $catid;
}

?>
<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Student List</title>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Student List
      </h1>
      <ol class="breadcrumb bg-default">
        <li><a href="#" class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Students</li>
        <li class="active text-white">Student List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          // echo "
          //   <div class='alert alert-danger alert-dismissible'>
          //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //     <h4><i class='icon fa fa-warning'></i> Error!</h4>
          //     ".$_SESSION['error']."
          //   </div>
          // ";
          echo "'<script type='text/javascript'>toastr.error('Error!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['error']."')</script>';";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          // echo "
          //   <div class='alert alert-success alert-dismissible'>
          //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //     <h4><i class='icon fa fa-check'></i> Success!</h4>
          //     ".$_SESSION['success']."
          //   </div>
          // ";
          echo "'<script type='text/javascript'>toastr.success('Success!&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['success']."')</script>';";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-plus"></i> New</a>
              <!-- <a href="student_print.php" target="_blank" class="btn btn-info btn-sm btn-rounded"><i class="fa fa-print"></i></a> -->

              <div class="box-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Room Number: </label>
                      <select class="form-control input-sm" id="select_category">
                        <option value="0">ALL</option>
                        <?php
                        $sql = "SELECT *,rooms.id AS ID FROM rooms LEFT JOIN floor_category ON floor_category.id=rooms.floor_category_id 
                        LEFT JOIN room_category ON room_category.id=rooms.room_category_id WHERE occupants > 0";
                        $query = $conn->query($sql);
                        while ($catrow = $query->fetch_assoc()) {
                          $selected = ($catid == $catrow['ID']) ? " selected" : "";
                          echo "
                            <option value='" . $catrow['ID'] . "' " . $selected . ">" . $catrow['floor_name'] . '-' . $catrow['room_name'] . "</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>
                  </form>
                </div>


            </div>

            <div class="box-body">
            <div class="table-responsive">

              <table id="example" class="table table-bordered table-striped">
                <thead>
                  
                  <th>Photo</th>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Privilege</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Contact No.</th>
                  <th>Email</th>
                  <th>Name of Guardian</th>
                  <th>Contact# of Guardian</th>
                  <th>Room</th>
                  <th>Course</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
 
                    $sql = "SELECT *, students.student_id AS studid FROM students LEFT JOIN course ON course.id=students.course_id 
                    LEFT JOIN floor_category ON floor_category.id=students.floor_id LEFT JOIN room_category ON room_category.id=students.room_id $where ORDER BY created_at DESC";
                    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $photo = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                      echo "
                        <tr>
                          
                          <td>
                            <img src='".$photo."' width='60px' height='60px'>
                            <a href=#edit_photo data-toggle='modal' class='pull-right photo' data-id='".$row['studid']."'><span class='fa fa-edit'></span></a>
                          </td>
                          <td>".$row['student_id']."</td>
                          <td>".$row['firstname']. ' ' .$row['lastname']."</td>
                          <td>".$row['privilege']."</td>
                          <td>".$row['gender']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['contact']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['guardian']."</td>
                          <td>".$row['guardian_contact']."</td>
                          <td>".$row['floor_name'].'-'.$row['room_name']."</td>
                          <td>".$row['code']."</td>
                          <td>
                            <button class='btn btn-sm btn-warning edit btn-rounded' data-id='".$row['studid']."'><i class='fa fa-edit'></i></button>
                            <button class='btn btn-sm btn-danger delete btn-rounded' data-id='".$row['studid']."'><i class='fa fa-trash'></i></button>
                          </td>
                        </tr>
                      ";
                    }

                  ?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/student_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $('#select_category').change(function() {
        var value = $(this).val();
        if (value == 0) {
          window.location = 'student.php';
        } else {
          window.location = 'student.php?rooms=' + value;
        }
      });

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'student_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.studid').val(response.studid);
      $('#edit_student_id').val(response.student_id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_gender').val(response.gender);
      $('#edit_privilege').val(response.privilege);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact);
      $('#edit_email').val(response.email);
      $('#edit_guardian').val(response.guardian);
      $('#edit_guardian_contact').val(response.guardian_contact);
      $('#display_photo').attr("src", response.photo ? '../images/' + response.photo : '../images/profile.jpg');
      $('#selfloor').val(response.floor_id);
      $('#selfloor').html(response.floor_name);
      $('#selroom').val(response.room_id);
      $('#selroom').html(response.room_name);
      $('#selcourse').val(response.course_id);
      $('#selcourse').html(response.code);
      
      $('.del_stu').html(response.firstname+' '+response.lastname);
    }
  });
}

</script>
</body>
</html>
