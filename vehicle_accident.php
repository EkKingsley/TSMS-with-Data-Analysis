<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/functions.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
  {
	$loc = $_POST['loc'];
    $cause = $_POST['cause'];
    $nPassengers = $_POST['nP'];
    $nInjured = $_POST['nI'];
    $nDead = $_POST['nD'];
    $vehicle_id = vid_parsing($_POST['vehicleID']);
    
    $q = "INSERT INTO `vehicle_accident_record`(`accident_recordNumber`, `location_of_accident`, `cause_of_accident`, `tot_number_of_Passengers`, `number_dead`, `number_injured`, `vehicle_ID`) VALUES ('', '$loc', '$cause', $nPassengers, $nDead, $nInjured, '$vehicle_id')";
    
    if($vehicle_id && $loc && $cause && $nPassengers && $nInjured && $nDead){
        $result = @mysqli_query($conn, $q);
    }
    
    if($result){
        $msg="Vehicle Accident Recorded Successfully";
        mysqli_close($conn);
    }else{
        $error = "Vehicle Accident Record Unsuccessful!";
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
	
	<title>Vehicle Accident Record</title>

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
						<h3 class="page-title">Vehicle Accident Record</h3>
						<div class="row">
							<div class="col-md-5 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Accident Record</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <label for="" class="text-uppercase text-sm">Location of Accident</label>
                <input type="text" placeholder="Accident Location" maxlength="40" name="loc" class="form-control mb" required value="<?php if(isset($_POST['loc'])) echo $_POST['loc']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="" class="text-uppercase text-sm">Cause of Accident</label>
                <input type="text" placeholder="Accident Cause" maxlength="100" name="cause" class="form-control mb" required value="<?php if(isset($_POST['cause'])) echo $_POST['cause']; ?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="" class="text-uppercase text-sm">Total Passengers</label>
                <input type="number" name="nP" class="form-control mb" required value="<?php if(isset($_POST['nP'])) echo $_POST['nP']; ?>"><span class="text-danger"><?php if(isset($age_error)) echo $age_error; ?></span>
            </div>
            <div class="col-md-4">
                <label for="" class="text-uppercase text-sm">Number Injured</label>
                <input type="number" name="nI" class="form-control mb" required value="<?php if(isset($_POST['nI'])) echo $_POST['nI']; ?>"><span class="text-danger"><?php if(isset($age_error)) echo $age_error; ?></span>
            </div>
            <div class="col-md-4">
                <label for="" class="text-uppercase text-sm">Number Dead</label>
                <input type="number" name="nD" class="form-control mb" required value="<?php if(isset($_POST['nD'])) echo $_POST['nD']; ?>"><span class="text-danger"><?php if(isset($age_error)) echo $age_error; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="" class="text-uppercase text-sm">Vehicle ID</label>
                <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php if(isset($_POST['vehicleID'])) echo $_POST['vehicleID']; ?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="SUBMIT">
            </div>
        </div>
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
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>

</body>
</html>
<?php } ?>