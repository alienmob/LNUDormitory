<?php include 'includes/session.php'; ?>
<?php 
  include 'includes/timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

<?php include 'includes/header.php'; ?>
<title>LNU Dormitory | Dashboard</title>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-gradient-default">
    <!-- Content Header (Page header) -->
    <section class="content-header text-white">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb bg-default">
        <li><a href="#"class="text-white"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active text-white">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <style>
.fc-event-main {
	cursor: pointer !important;
}
</style>
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
        if(isset($_SESSION['login'])){
          // echo "
          //   <div class='alert alert-success alert-dismissible'>
          //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //     <h4><i class='icon fa fa-check'></i> Success!</h4>
          //     ".$_SESSION['success']."
          //   </div>
          // ";
          echo "'<script type='text/javascript'>toastr.info('&nbsp;&nbsp;".$_SESSION['login']."')</script>';";
          unset($_SESSION['login']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-info">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM students";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Total Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="student.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-pink">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM pending";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Total Pending Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="pending.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM returns";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
             
              <p>Returned Equipments</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-reply"></i>
            </div>
            <a href="return.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-danger">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM borrow";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Borrowed Equipments</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="borrow.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-primary">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM transient";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Total Transient Record</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="transient.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-purple">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM event";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Total Events</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="event.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-translucent-primary">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM equipments";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Total Equipments</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
            <a href="equipment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-gray">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM checkin";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
             
              <p>Checked In Transient</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <a href="checkin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
      </div>
      <!-- /.row -->


      <div class="row">

      <div class="col-xs-6 pull-left">
          <div class="box">
              
            <div class="box-body">
            <h4 class="box-title">Calendar of Dorm Events</h4>
              <div id="calendar">
              </div>
            </div>
          </div>
        </div>


        <div class="col-xs-6 pull-right">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Paid & Unpaid Status Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2020; $i<=2030; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>

        
      </div>
      


      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/info-modal.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $unpaid = array();
  $paid = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM unpaid WHERE MONTH(date_unpaid) = '$m' AND YEAR(date_unpaid) = '$year'";
    $rquery = $conn->query($sql);
    array_push($unpaid, $rquery->num_rows);

    $sql = "SELECT * FROM paid WHERE MONTH(date_paid) = '$m' AND YEAR(date_paid) = '$year'";
    $bquery = $conn->query($sql);
    array_push($paid, $bquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $unpaid = json_encode($unpaid);
  $paid = json_encode($paid);

?>
<!-- End Chart Data -->





<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Paid',
        fillColor           : 'rgba(34, 34, 133, 1)',
        strokeColor         : 'rgba(34, 34, 133, 1)',
        pointColor          : 'rgba(34, 34, 133, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(34, 34, 133, 1)',
        data                : <?php echo $paid; ?>
      },
      {
        label               : 'Unpaid',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $unpaid; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#fbb140'
  barChartData.datasets[1].strokeColor = '#fbb140'
  barChartData.datasets[1].pointColor  = '#fbb140'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});

</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});

document.addEventListener('DOMContentLoaded', async function() {
		let response = await fetch('includes/fetch_event.php');
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				events: response,
				eventClick: function(info) {
					 console.log(info.event.extendedProps);
						$('#eventtitle').text(info.event.extendedProps.full_info.event_name);
						$('#eventdescription').text(info.event.extendedProps.full_info.description);
						$('#eventlocation').text(info.event.extendedProps.full_info.location);
						$('#eventdate').text(info.event.extendedProps.full_info.date);
						$('#eventstart').text(info.event.extendedProps.full_info.time_start);
						$('#eventend').text(info.event.extendedProps.full_info.time_end);
						$('#eventstatus').text(info.event.extendedProps.full_info.status);
						$('#infomodal').modal('show')
				}
		});
		calendar.render();
});
</script>
</body>
</html>
