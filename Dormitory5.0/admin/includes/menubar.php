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
        <a><i class="fa fa-circle text-success"></i> Dorm Manager</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header bg-orange">REPORTS</li>
      <li class=""><a href="home.php" class="text-white"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      
      <li class="header bg-orange">MANAGE</li>
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
          <li><a href="violation.php"><i class="fa fa-circle-o"></i> Violations</a></li>
          <li><a href="course.php"><i class="fa fa-circle-o"></i> Courses</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-list-alt"></i>
          <span>Student Logs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="student_stat.php"><i class="fa fa-circle-o"></i> Status</a></li>
          <li><a href="log.php"><i class="fa fa-circle-o"></i> Log Book</a></li>
          <li><a href="timein.php"><i class="fa fa-circle-o"></i> Time In Record</a></li>
          <li><a href="timeout.php"><i class="fa fa-circle-o"></i> Time Out Record</a></li>
          
          
          <!-- <li><a href="log.php"><i class="fa fa-circle-o"></i> Log Record</a></li> -->
        </ul>
      </li>

      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-refresh"></i>
          <span>Borrow&Return Records</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="pending.php"><i class="fa fa-circle-o"></i> Pending Requests</a></li>
          <li><a href="borrow.php"><i class="fa fa-circle-o"></i> Borrowed Equipment</a></li>
          <li><a href="return.php"><i class="fa fa-circle-o"></i> Returned Equipment</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-table"></i>
          <span>Payment Records</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="unpaid.php"><i class="fa fa-circle-o"></i> Unpaid Status</a></li>
        <li><a href="paid.php"><i class="fa fa-circle-o"></i> Paid Status</a></li>
          <!-- <li><a href="promissory.php"><i class="fa fa-circle-o"></i> Promissory Status</a></li> -->
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-newspaper-o"></i>
          <span>Announcements</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="event.php"><i class="fa fa-circle-o"></i> Event Management</a></li>
          <li><a href="eventcat.php"><i class="fa fa-circle-o"></i> Category</a></li>
          <li><a href="#attendance" data-toggle="modal"><i class="fa fa-pencil-square-o"></i><span>Attendance</span></a></li>
        </ul>
      </li>


      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-map-marker"></i>
          <span>Room Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="room.php"><i class="fa fa-circle-o"></i> Rooms</a></li>
          <li><a href="room_m.php"><i class="fa fa-circle-o"></i> Room Management</a></li>
          <li><a href="room_reports.php"><i class="fa fa-circle-o"></i> Reports</a></li>
          <li><a href="floor_category.php"><i class="fa fa-circle-o"></i> Floor Category</a></li>
          <li><a href="room_category.php"><i class="fa fa-circle-o"></i> Room Category</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-briefcase"></i>
          <span>Equipment Mgmt.</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment List</a></li>
          
          <li><a href="equipment_u.php"><i class="fa fa-circle-o"></i> Qty. Management</a></li>
          <li><a href="equipment_reports.php"><i class="fa fa-circle-o"></i> Reports</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Equipment Category</a></li>
          
        </ul>
      </li>


      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-users"></i>
          <span>Transient Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="transient.php"><i class="fa fa-circle-o"></i> Transient List</a></li>
          <li><a href="checkin.php"><i class="fa fa-circle-o"></i> Check In Status</a></li>
          <li><a href="checkout.php"><i class="fa fa-circle-o"></i> Check Out Status</a></li>
        </ul>
      </li>      
      
      <!-- <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-table"></i>
          <span>Others</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="log.php"><i class="fa fa-circle-o"></i> Log Book</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Tenants Behavioral Records</a></li>
          
        </ul>
      </li> -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>


<?php include 'includes/event_a_modal.php'; ?>