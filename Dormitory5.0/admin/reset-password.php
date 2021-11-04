<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>LNU Dormitory | Reset Password</title>
  <!-- Google Font -->

    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/css/all.min.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/png">
  <link rel="stylesheet" href="assets/css/logo.css" type="text/css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/all.min.js"></script>

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
      <div class="header-body text-center mb-9">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-8 px-5 mt-5">
            <!-- <h1 class="text-white">Leyte Normal University</h1>
            <p class="text-lead text-white">Student Dormitory</p> -->
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



<?php
 include('includes/conn.php');
 session_start(); 

if (isset($_GET["token"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
  
  $token = $_GET["token"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $sql = "SELECT * FROM `password_reset` WHERE `token`='".$token."' and `email`='".$email."'";
  $query = $conn->query($sql);
  if($query->num_rows < 1){
   $_SESSION['expired'] = 'Password reset doesn\'t exist';
  } 
  else {
   $query = $conn->query($sql);
   if($row = $query->fetch_assoc()){
   $expDate = $row['expDate'];
    if ($expDate >= $curDate){
    ?>


  <!-- Main content -->
  <div class="main-content">
   
    <!-- Page content -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5">
            <!-- <img src="assets/img/logo.png" class="centerL"> -->
        

              <div class="text-center text-muted mb-4">
              <strong><big>Reset Your Password</big></strong>
              </div>
			  <?php
        // Expired
 if(isset($_SESSION['expired'])){
  echo "
  <div class='alert alert-danger alert-dismissible'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <big>&nbsp;&nbsp<i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['expired']."</big>
</div>
  ";
  unset($_SESSION['expired']);
 }

// Password error
 if(isset($_SESSION['password_match_error'])){
  echo "
  <div class='alert alert-danger alert-dismissible'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <big>&nbsp;&nbsp<i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['password_match_error']."</big>
</div>
  ";
  unset($_SESSION['password_match_error']);
 }

// Success
 if(isset($_SESSION['success'])){
  echo "
  <div class='alert alert-danger alert-dismissible'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <big>&nbsp;&nbsp<i class='fas fa-check'></i>&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['success']."</big>
  <h2><a href='index.php'>Login</a></h2>","
</div>
  ";
  unset($_SESSION['success']);
}
  	?>
    	<form action="includes/reset-pass.php" method="POST" name="update">
      <input type="hidden" name="action" value="update" />
		<div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key fa-lg fa-fw"></i></span>
                    </div>
                    <input class="form-control" name = "pass1" maxlength="15" placeholder="Enter New Password" type = "password" required autofocus>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key fa-lg fa-fw"></i></span>
                    </div>
                    <input class="form-control" name = "pass2" maxlength="15" placeholder="Re-Enter New Password" type = "password" required autofocus>
                  </div>
                </div>	
                
    			<div class="form-group">
            <input type="hidden" name="email" value="<?php echo $email;?>"/>
            <input type="hidden" name="token" value="<?php echo $token;?>"/>
					  <input type="submit" class="btn btn-warning btn-block btn-md rounded-3 mt-4" value="Reset Password">
            
      		</div>  
    	</form>



  	</div>

	  </div>
          </div>    
        </div>
      </div>
  
</div>
	

    
 <?php
    }
   }
   else{
    $_SESSION['expired'] = 'Password reset already expired';
   }
  }
  
  
 } 

// EXPIRED
 if(isset($_SESSION['expired'])){
  echo "
  <div class='main-content'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-5 col-md-7'>
        
        <div class='card bg-secondary border-0 mb-0'>

          <div class='card-body px-lg-5'>
          <img src='assets/img/logo.png' class='centerL'>
      

            <div class='alert alert-danger text-center'>
            <h3><i class='fas fa-exclamation-triangle'></i> Error!</h3>
            <big>".$_SESSION['expired']."</big><br><br><h2><a href='index.php'>Retry</a></h2>","
          </div>


    </div>
  </div>
        </div>    
      </div>
    </div>
</div>
  ";
  unset($_SESSION['expired']);
 }

// PASSWORD ERROR
 if(isset($_SESSION['password_match_error'])){
  echo "
  <div class='main-content'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-5 col-md-7'>
        
        <div class='card bg-secondary border-0 mb-0'>

          <div class='card-body px-lg-5'>
          <img src='assets/img/logo.png' class='centerL'>
      


    <div class='alert alert-danger text-center'>
      <h3><i class='fas fa-exclamation-triangle'></i> Error!</h3>
      <big>".$_SESSION['password_match_error']."</big><br><br><h2><a href='index.php'>Retry</a></h2>","
    </div>


  </div>
  </div>
        </div>    
      </div>
    </div>
</div>
  ";

  echo "'<script type='text/javascript'>toastr.error('Error!".$_SESSION['password_match_error']."')</script>';";

  unset($_SESSION['password_match_error']);
 }

// SUCCESS
 if(isset($_SESSION['success'])){
  echo "
  <div class='main-content'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-5 col-md-7'>
        
        <div class='card bg-secondary border-0 mb-0'>

          <div class='card-body px-lg-5'>
          <img src='assets/img/logo.png' class='centerL'>
      

            <div class='alert alert-success text-center'>
            <h3><i class='fas fa-check'></i> Success!</h3>
            <big>".$_SESSION['success']."</big><br><br><h2><a href='index.php'>Login</a></h2>","
          </div>

    </div>
    </div>
          </div>    
        </div>
      </div>
  </div>
  ";

  echo "'<script type='text/javascript'>toastr.success('Success!".$_SESSION['success']."')</script>';";

  unset($_SESSION['success']);
}
 ?>

<?php include 'includes/scripts.php' ?>

<!-- Footer -->
<!-- <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2021 <a href="https://www.lnu.edu.ph/" class="font-weight-bold ml-1" target="_blank">Leyte Normal University</a>
          </div>
        </div>
        
      </div>
    </div>
  </footer> -->

  <!-- jQuery CDN -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/all.min.js"></script>
</body>
</html>