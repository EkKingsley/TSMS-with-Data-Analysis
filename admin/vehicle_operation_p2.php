<?php
$eTime = date("h:i:s");
$opDate = date("Y-m-d");

session_start();
error_reporting(0);
include('includes/config.php');
include('includes/functions.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
    
if(!isset($_SESSION['trp_start'])){
    header('location:vehicle_operation_p1.php');
}

$stime = $_POST['t_sTime'];
$startLoc = $_POST['t_sLoc'];
$sgr = $_POST['t_sGasR'];
$startOdometer = $_POST['t_sOR'];

	
if(isset($_POST['submit']))
  {
	$date = $_POST['opdate'];
    $etime = $_POST['t_eTime'];
    $endLoc = $_POST['t_eLoc'];
    $endOdometer = $_POST['t_eOR'];
    $gg = $_POST['gg'];
    $vehicle_id = vid_parsing($_POST['vehicleID']);
    
    if(isset($_POST['t_eGR'])){
        if(!floatval($_POST['t_eGR'])){
            $gr_error = "Gallon Reading should be decimal";
        }else{
            $egr = $_POST['t_eGR'];
        }
    }
    
    if(isset($_POST['cost'])){
        if(!doubleval($_POST['cost'])){
            $cost_error = "Cost should be decimal";
        }else{
            $cost = doubleval($_POST['cost']);
        }
    }
    
    $q ="INSERT INTO `vehicle_operation_tbl`(`operation_number`, `date`, `trip_startTime`, `trip_startLocation`, `trip_start_OdometerReading`, `trip_start_gasReading`, `trip_endTime`, `trip_endLocation`, `trip_end_OdometerReading`, `trip_end_gasReading`, `gas_gallons`, `gas_cost`, `vehicle_ID`) VALUES ('', $date, $sTime, '$startLoc', $startOdometer, $sgr, $etime, '$endLoc', $endOdometer, $egr, $gg, $cost, $vehicle_id)";
    
    if($sTime && $startLoc && $startOdometer && $gr && $date){
        $result = @mysqli_query($conn, $q);
    }
    
    if($result){
        $msg="Vehicle Operation Recorded Successfully";
        mysqli_close($conn);
    }
	

	
	
	
}    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Vehicle Operation Record</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>

	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Vehicle Operation Record</h3>
						<div class="row">
							<div class="col-md-5 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Trip End Details</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        
        <input type="hidden" name="opdate" class="form-control mb" required value="<?php if(isset($opDate)) echo $opDate; ?>">
        
        <input type="hidden" name="t_eTime" value="<?php if(isset($eTime)) echo $eTime; ?>">
        
        <label for="" class="text-uppercase text-sm">Trip End Location</label>
        <input type="text" placeholder="Trip end location" name="t_eLoc" class="form-control mb" required value="<?php if(isset($_POST['t_eLoc'])) echo $_POST['t_eLoc']; ?>"><?php if($vehicle_id_error) echo "<span class=\"text-danger\">". $vehicle_id_error . "</span><br>"?>
        
        <label for="" class="text-uppercase text-sm">Trip End Odometer Reading</label>
        <input type="number" pattern="[0-9]" placeholder="Odometer Reading" name="t_eOR" class="form-control mb" required value="<?php if(isset($_POST['t_eOR'])) echo $_POST['t_eOR']; ?>">
        
        <label for="" class="text-uppercase text-sm">Vehicle ID</label>
        <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php if(isset($_POST['vehicleID'])) echo $_POST['vehicleID']; ?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>
        
        <input type="submit" class="btn btn-primary btn-block" name="submit" value="SUBMIT">
</form>
</div>
                                    
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	

</body>
</html>
<?php } ?>