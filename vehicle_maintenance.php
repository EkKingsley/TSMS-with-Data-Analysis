<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('../includes/functions.php');
if(strlen($_SESSION['dlogin'])==0)
	{	
header('location:index.php');
}
else{



	
if(isset($_POST['submit']))
  {
	
	$station = $_POST['mStation'];
    $service = $_POST['service'];
	$serviced_by = $_POST['s_by'];
    $vehicle_id = vid_parsing($_POST['vehicleID']);
    $date = date("Y-m-d", strtotime($_POST['date']));
    
    if(isset($_POST['cost'])){
        if(!doubleval($_POST['cost'])){
            $cost_error = "Cost should be decimal";
        }else{
            $cost = doubleval($_POST['cost']);
        }
    }
    
    $q = "INSERT INTO `vehicle_maintenance_tbl`(`record_number`, `maintenance_station`, `service_performed`, `serviced_by`, `maintenance_cost`, `vehicle_ID`) VALUES ('', '$station', $service, $serviced_by, $cost,  $vehicle_id)";
    
    if($station && $vehicle_id && $service && $serviced_by && $cost){
        $result = @mysqli_query($conn, $q);
    }
    
    if($result){
        $msg="Vehicle Maintenance Recorded Submitted Successfully";
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
	
	<title>Vehicle Maintenance Record</title>

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
						<h3 class="page-title">Vehicle Maintenance Record</h3>
						<div class="row">
							<div class="col-md-5 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Maintenance Record</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        <label for="" class="text-uppercase text-sm">Maintenance Station</label>
        <input type="text" placeholder="Maintenance Station" name="mStation" class="form-control mb" required value="<?php if(isset($_POST['mStation'])) echo $_POST['mStation']; ?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>
        
        <label for="" class="text-uppercase text-sm">Service Performed</label>
        <input type="text" placeholder="Service" name="service" class="form-control mb" required value="<?php if(isset($_POST['service'])) echo $_POST['service']; ?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>
        
        <label for="" class="text-uppercase text-sm">Serviced By</label>
        <input type="text" placeholder="Serviced By" name="by" class="form-control mb" required value="<?php if(isset($_POST['by'])) echo $_POST['by']; ?>"><span class="text-danger">

        <label for="" class="text-uppercase text-sm">Maintenance Cost</label>
        <input type="text" placeholder="Cost" name="cost" class="form-control mb" required value="<?php if(isset($_POST['cost'])) echo $_POST['cost']; ?>"><?php if($cost_error) echo "<span class=\"text-danger\">". $cost_error . "</span><br>"?>
        
        <label for="" class="text-uppercase text-sm">Vehicle ID</label>
        <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php if(isset($_POST['vehicleID'])) echo $_POST['vehicleID']; ?>"><?php if($vehicleid_error) echo "<span class=\"text-danger\">". $vehicleid_error . "</span><br>"?>
                                                            
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