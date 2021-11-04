<aside class="main-sidebar bg-gradient-warning">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($student['photo'])) ? './images/'.$student['photo'] : './images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $student['firstname'].' '.$student['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header bg-orange">REPORTS</li> -->
      <li class=""><a href="home.php" class="text-white"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li class=""><a href="announcements.php" class="text-white"><i class="fa fa-newspaper-o"></i> <span>Announcements</span></a></li>
      <li class=""><a href="equipments.php" class="text-white"><i class="fa fa-cube"></i> <span>Equipments</span></a></li>
      <li class="treeview">
        <a href="#" class="text-white">
          <i class="fa fa-refresh"></i>
          <span>Transactions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="borrow.php"><i class="fa fa-circle-o"></i> Borrowed Equipments</a></li>
          <li><a href="return.php"><i class="fa fa-circle-o"></i> Returned Equipments</a></li>
          <li><a href="pending.php"><i class="fa fa-circle-o"></i> Pending Requests</a></li>
          
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
        <li><a href="unpaid.php"><i class="fa fa-circle-o"></i> Unpaid Record</a></li>
        <li><a href="paid.php"><i class="fa fa-circle-o"></i> Paid Record</a></li>
          <!-- <li><a href="promissory.php"><i class="fa fa-circle-o"></i> Promissory Status</a></li> -->
          
        </ul>
      </li>
      <li class=""><a href="violation.php" class="text-white"><i class="fa fa-exclamation-triangle"></i> <span>Violations</span></a></li>
      
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>