<aside class="main-sidebar bg-gradient-warning">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> MIS</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header bg-orange">REPORTS</li>
      <li class=""><a href="home.php" class="text-white"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      
      <li class="header bg-orange">MANAGE</li>
      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-user"></i>
          <span>Admin Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="admin.php"><i class="fa fa-circle-o"></i> Admin List</a></li>
          <!-- <li><a href="log_record.php"><i class="fa fa-circle-o"></i> Log Record</a></li> -->
        </ul>
      </li>
      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-graduation-cap"></i>
          <span>Students</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="student.php"><i class="fa fa-circle-o"></i> Student List</a></li>
          <li><a href="course.php"><i class="fa fa-circle-o"></i> Courses</a></li>
        </ul>
      </li>

      <li><a href="#backup" data-toggle="modal" class="text-white"><i class="fa fa-download"></i> <span>Back Up Database</span></a></li>
      
     
    </ul>
    
  </section>
  <!-- /.sidebar -->
</aside>

<?php include 'includes/backup_modal.php'; ?>