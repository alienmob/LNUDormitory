<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>LNU Dormitory | Students</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="admin/assets/img/logo.png" type="image/png">
    
    <!-- <link rel="stylesheet" href="print.css" media="print"> -->

  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css" rel="stylesheet" /> -->
    <link href="admin/assets/css/fullcalendar@5.8.0/main.css" rel="stylesheet">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="admin/assets/css/2bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="admin/assets/js/jquery.min.js"></script>

<!-- Newww -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="admin/assets/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" href="admin/assets/css/buttons.dataTables.min.css">


<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/> -->
<link href="admin/assets/css/toastr.css" rel="stylesheet"/>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
<script src="admin/assets/js/toastr.js"></script>

  	<style type="text/css">
      body {
		font-family: 'Varela Round', sans-serif;
	}
  		.mt20{
  			margin-top:20px;
  		}
      .bold{
        font-weight:bold;
      }

      /*chart style*/
      #legend ul {
        list-style: none;
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
        border-radius: 5px;
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
      }

      #legend li span {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
        border-radius: 5px;
        
      }
      .text-white
{
    color: #fff !important;
}
.text-default
{
    color: #172b4d !important;
}
      .bg-gradient-default
{
    background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
}
.bg-gradient-warning
{
    background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;
}
.bg-gradient-warning2
{
    background: linear-gradient(87deg, #fbb140 0, #fb6340 100%) !important;
}
.bg-orange
{
    background-color: #fb6340 !important;
}
.bg-default
{
    background-color: #172b4d !important;
}
.bg-gradient-dark
{
    background: linear-gradient(87deg, #3f4041 0, #727485 100%) !important;
}
.bg-gradient-info
{
    background: linear-gradient(87deg, #11cdef 0, #1171ef 100%) !important;
}
.bg-gradient-danger
{
    background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important;
}
.bg-gradient-blue
{
    background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}
.bg-gradient-green
{
    background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important;
}

.bg-gradient-teal
{
    background: linear-gradient(87deg, #11cdef 0, #1171ef 100%) !important;
}
.bg-gradient-pink
{
    background: linear-gradient(87deg, #f3a4b5 0, #f3b4a4 100%) !important;
}
.bg-gradient-gray
{
    background: linear-gradient(87deg, #8898aa 0, #888aaa 100%) !important;
}

.bg-gradient-gray-dark
{
    background: linear-gradient(87deg, #32325d 0, #44325d 100%) !important;
}
.bg-gradient-indigo
{
    background: linear-gradient(87deg, #9d03ad 0, #5603ad 100%) !important;
}
.bg-dark2
{
    background-color: #222d32 !important;
}
.bg-gradient-primary
{
    background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}
.bg-gradient-purple
{
    background: linear-gradient(87deg, #8965e0 0, #bc65e0 100%) !important;
}
.bg-translucent-primary
{
    background-color: rgba(83, 97, 243, .9) !important;
}

  	</style>
</head>