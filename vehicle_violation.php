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
	
	$penal = $_POST['penal'];
    $vioreasons = $_POST['vr'];
	$note = $_POST['note'];
    $vehicle_id = vid_parsing($_POST['vehicleID']);
    
    $q = "INSERT INTO `vehicle_violation_record`(`vv_number`, `violation_reasons`, `penalisation`, `Note_on_penalisation`, `vehicle_ID`) VALUES ('', '$vioreasons', '$penal', '$note', '$vehicle_id')";
    
    if($note && $vehicle_id && $penal && $vioreasons){
        $result = @mysqli_query($conn, $q);
    }
    
    if($result){
        $msg="Vehicle Violation Recorded Successfully";
        mysqli_close($conn);
    }else{
        $error = "Vehicle Violation Record Unsuccessful!";
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
	
	<title>Vehicle Violation Record</title>

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
						<h3 class="page-title">Vehicle Violation Record</h3>
						<div class="row">
							<div class="col-md-5 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Violation Record</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        <label for="" class="text-uppercase text-sm">Vehicle ID</label>
        <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php if(isset($_POST['vehicleID'])) echo $_POST['vehicleID']; ?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>

        <label for="" class="text-uppercase text-sm">Violation Reasons</label>
        <textarea placeholder="Violation Reasons..." maxlength="150" name="vr" class="form-control mb" required value="<?php if(isset($_POST['vr'])) echo $_POST['vr']; ?>"></textarea>
        
        <label for="" class="text-uppercase text-sm">Penalisation</label>
        <select name="penal" class="form-control mb" required>
                <option value="fine">Fine</option>
                <option value="dismisal">Dismissal</option>
        </select>
        
        <label for="" class="text-uppercase text-sm">Note on Penalisation</label>
        <textarea placeholder="Note..." maxlength="50" rows="2" name="note" class="form-control mb" required value="<?php if(isset($_POST['note'])) echo $_POST['note']; ?>"></textarea>
                                                            
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