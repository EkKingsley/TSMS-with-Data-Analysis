<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {
	
	$vehicleid = $_POST['vehicleID'];
    $model = $_POST['model'];
	$line_number = $_POST['line'];
    $year = $_POST['year'];
    $odometer = $_POST['odometer'];
    
    $sql= "UPDATE `vehicle_info_tbl` SET `model`='$model',`year`=$year,`odometer_reading`=$odometer,`vehicle_ID`='$vehicleid',`line_number`=$line_number WHERE `vehicle_number`=$editid";
    
    if($model && $year && $odometer && $line_number && $vehicleid){
        $result = @mysqli_query($conn, $sql);
    }
    
    if($result){
        $msg="Vehicle Information Updated Successfully";
        mysqli_close($conn);
    }else{
        $error = "Vehicle Information Update Unsuccessful";
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
	
	<title>Edit User</title>

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
<?php
		$sql = "SELECT * FROM `vehicle_info_tbl` WHERE `vehicle_number` = $editid";
		$result = @mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
			
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Edit Vehicle : <?php echo htmlentities($rows['vehicle_ID']);?></h3>
						<div class="row">
							<div class="col-md-5 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Vehicle Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        <label for="" class="text-uppercase text-sm">Vehicle ID<span style="color:red">*</span></label>
        <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php echo $rows['vehicle_ID'];?>"><?php if($vehicleid_error) echo "<span class=\"text-danger\">". $vehicleid_error . "</span><br>"?>

        <label for="" class="text-uppercase text-sm">Vehcile Model</label>
        <input type="text" placeholder="model" name="model" class="form-control mb" required value="<?php echo $rows['model'];?>">
        
        <label for="" class="text-uppercase text-sm">Year</label>
        <input type="number" pattern="[1-9]{4}" placeholder="Year" name="year" class="form-control mb" required value="<?php echo $rows['year'];?>"><?php if($year_error) echo "<span class=\"text-danger\">". $year_error . "</span><br>"?>
        
        <label for="" class="text-uppercase text-sm">Odometer Reading</label>
        <input type="number" pattern="[0-9]{10}" placeholder="Odometer Reading" name="odometer" class="form-control mb" required value="<?php echo $rows['odometer_reading'];?>"><?php if($odometer_error) echo "<span class=\"text-danger\">". $odometer_error . "</span><br>"?>
        
        <label for="" class="text-uppercase text-sm">Line Number</label>
        <input type="number" placeholder="Line Number" name="line" class="form-control mb" required value="<?php echo $rows['line_number'];?>">
                                                            
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