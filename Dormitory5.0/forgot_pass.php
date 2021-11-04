<?php
  	session_start();
  	if(isset($_SESSION['student'])){
    	header('location:home.php');
  	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Students | LNU Dormitory</title>
    <link rel="stylesheet" href="admin/assets/css/main.css" type="text/css">
  <!-- Icons -->
  <link rel="stylesheet" href="admin/assets/css/all.min.css" />
  <link rel="icon" href="admin/assets/img/logo.png" type="image/png">
  <link rel="stylesheet" href="admin/assets/css/logo.css" type="text/css">
<script type="text/javascript" src="admin/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="admin/assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="admin/assets/js/all.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<style type="text/css">
body {
		font-family: 'Varela Round', sans-serif;
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
          
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5">
            <img src="admin/assets/img/logo.png" class="centerL">
        

              <div class="text-center text-muted mb-4">
                <strong><big>Enter your Email to Send Reset Password Link</big></strong>
              </div>
              <?php
              if(isset($_SESSION['not_sent'])){
                echo "
                  <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <big><i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;".$_SESSION['not_sent']."</big>
                  </div>
                ";
                unset($_SESSION['not_sent']);
               }

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
    	<form action="includes/forgot.php" method="POST">
		<div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                    </div>
                    <input class="form-control" name = "email" placeholder="Enter Your Email" type = "email" required autofocus>
                  </div>
                </div>
				
                
    			<div class="form-group">
					  <input type="submit" class="btn btn-warning btn-block btn-md rounded-3 mt-4" name="forgot" value="Confirm">
            
      		</div>
          <div class="text-center"><a href="login_main.php"><i class="fa fa-sign-in-alt"></i> Return to Login Page</a></div>
          
    	</form>
  	</div>

	  </div>
          </div>    
        </div>
        <br>
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

