<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo bg-gradient-warning2">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>LNU</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><i class="fa fa-building" aria-hidden="true"></i><b>LNU</b>|Dormitory</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top bg-default">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-gradient-default">
              <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $user['firstname'].' '.$user['lastname']; ?>
                <small>Admin since <?php echo date('M. Y', strtotime($user['created_at'])); ?></small>
              </p>
            </li>
            <li class="user-footer bg-default">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-warning btn-rounded" id="admin_profile">Update</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-danger btn-rounded">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>