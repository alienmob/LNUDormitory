<?php
  	session_start();
  	if(isset($_SESSION['superadmin'])){
    	header('location:home.php');
  	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Super Admin | LNU Dormitory</title>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/css/all.min.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/png">
  <link rel="stylesheet" href="assets/css/logo.css" type="text/css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/all.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">

<style type="text/css">
body {
		font-family: 'Varela Round', sans-serif;
	}


  .center-lnu{
    position: absolute;
    top: -10%;
    padding-top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>

</head>
<body class="bg-default hold-transition login-page">
<!-- Header -->
<div class="header bg-gradient-warning py-1">
    <div class="container">
      <div class="header-body text-center mb-6">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-8 px-5 mt-6">
            <h1 class="text-white">Leyte Normal University</h1>
            <p class="text-lead text-white">Student Dormitory</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>

  <!-- Main content -->
  <div class="main-content">
   
    <!-- Page content -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          
          <div class="card bg-secondary border-0 mb-0 pt-8">

            <div class="card-body px-lg-5">
            <img src="assets/img/logo.png" class="center-lnu">
        

              <div class="text-center text-muted mb-4">
              <strong><big>MIS</big></strong>
              </div>
              <?php
  		 if(isset($_SESSION['error'])){
        echo "
          <div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <big><i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;".$_SESSION['error']."</big>
          </div>
        ";
        unset($_SESSION['error']);
       }

       if(isset($_SESSION['email_error'])){
        echo "
          <div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <big><i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;".$_SESSION['email_error']."</big>
          </div>
        ";
        unset($_SESSION['email_error']);
       }

       if(isset($_SESSION['reset_success'])){
        echo "
          <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <big><i class='fas fa-check'></i>&nbsp;&nbsp;".$_SESSION['reset_success']."</big>
          </div>
        ";
        unset($_SESSION['reset_success']);
       }

       if(isset($_SESSION['success'])){
        echo "
          <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <big><i class='fas fa-check'></i>&nbsp;&nbsp;".$_SESSION['success']."</big>
          </div>
        ";
        unset($_SESSION['success']);
       }
  	?>
    	<form action="login.php" method="POST">
		<div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user fa-lg fa-fw"></i></span>
                    </div>
                    <input class="form-control" name = "username" placeholder="Enter Username" type = "text" required autofocus>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key fa-lg fa-fw"></i></span>
                    </div>
                    <input class="form-control" name = "password" placeholder="Enter Password" type="password" required>
                  </div>
                </div>
    			<div class="form-group">
					  <input type="submit" class="btn btn-warning btn-block btn-md rounded-3 mt-4" name="login" value="Sign In">
      		</div>

          <!-- <div class="float-right"><a href="forgot_pass.php"><i class="fa fa-key"></i> Forgot Password?</a></div> -->
    	</form>
  	</div>

	  </div>
          </div>    
        </div>

        <br>
        <br>
        <br>
        <?php include 'includes/footer.php'; ?>
      </div>
  
</div>
	
<?php include 'includes/scripts.php' ?>



  <!-- jQuery CDN -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/all.min.js"></script>
</body>
</html>

