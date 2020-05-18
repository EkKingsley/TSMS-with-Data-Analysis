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
	
	$vehicleid = vid_parsing($_POST['vehicleID']);
    $model = $_POST['model'];
	$line_number = $_POST['line'];
    $year = $_POST['year'];
    $odometer = $_POST['odometer'];
    
    $sql= "INSERT INTO `vehicle_info_tbl`(`vehicle_number`, `model`, `year`, `odometer_reading`, `vehicle_ID`, `line_number`) VALUES ('', '$model', $year, $odometer , '$vehicleid', $line_number)";
    
    if($model && $year && $odometer && $line_number && $vehicleid){
        $result = @mysqli_query($conn, $sql);
    }
    
    if($result){
        $msg="Vehicle Information Entered Successfully";
        mysqli_close($conn);
    }else{
        $error = "Vehicle Information Enter Unsuccessful";
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
	
	<title>Vehicle Info Entry</title>

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
						<h3 class="page-title">Vehicle File Entry</h3>
						<div class="row">
							<div class="col-md-5 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Vehicle Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        <label for="" class="text-uppercase text-sm">Vehicle ID</label>
        <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php if(isset($_POST['vehicleID'])) echo $_POST['vehicleID']; ?>"><?php if($vehicleid_error) echo "<span class=\"text-danger\">". $vehicleid_error . "</span><br>"?>

        <label for="" class="text-uppercase text-sm">Vehcile Model</label>
        <input type="text" placeholder="model" name="model" class="form-control mb" required value="<?php if(isset($_POST['model'])) echo $_POST['model']; ?>">
        
        <label for="" class="text-uppercase text-sm">Year</label>
        <input type="number" pattern="[1-9]{4}" placeholder="Year" name="year" class="form-control mb" required value="<?php if(isset($_POST['year'])) echo $_POST['year']; ?>"><?php if($year_error) echo "<span class=\"text-danger\">". $year_error . "</span><br>"?>
        
        <label for="" class="text-uppercase text-sm">Odometer Reading</label>
        <input type="number" pattern="[0-9]{10}" placeholder="Odometer Reading" name="odometer" class="form-control mb" required value="<?php if(isset($_POST['odometer'])) echo $_POST['odometer']; ?>"><?php if($odometer_error) echo "<span class=\"text-danger\">". $odometer_error . "</span><br>"?>
        
        <label for="" class="text-uppercase text-sm">Line Number</label>
        <input type="number" placeholder="Line Number" name="line" class="form-control mb" required value="<?php if(isset($_POST['line'])) echo $_POST['line']; ?>">
                                                            
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