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


	
if(isset($_POST['register']))
  {
	
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$gender = $_POST['gender'];
    $age = $_POST['age'];
	$marital_s = $_POST['m_status']; 
	$phone = $_POST['phone'];
	$driver_licence = $_POST['d_licence'];
    $licence_deadline = date("Y-m-d", strtotime($_POST['licence_d']));
    $vehicle_id = $_POST['vehicleID'];
    $password = $_POST['password'];
    
    $q = "UPDATE `driver_info_tbl` SET `driver_fname`='$fname',`driver_lname`='$lname',`gender`='$gender',`age`=$age,`marital_status`='$marital_s',`phone`='$phone',`license_number`='$driver_licence',`license_deadline`='$licence_deadline',`password`='$password',`vehicle_ID`='$vehicle_id' WHERE `driver_number`=$editid";
    
    if($fname && $lname && $gender && $age && $marital_s && $phone && $driver_licence && $licence_deadline && $vehicle_id && $password){
        $result = @mysqli_query($conn, $q);
    }
    
    if($result){
        $msg="Driver Information Updated Successfully";
        mysqli_close($conn);
    }else{
        $error = "Driver Information Update Unsuccessful!";
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
	
	<title>Edit Driver</title>

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
		$sql = "SELECT * FROM `driver_info_tbl` WHERE `driver_number` = $editid";
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
						<h3 class="page-title">Edit Driver : <?php echo htmlentities($rows['driver_lname']) . ", " . htmlentities($rows['driver_fname']);?></h3>
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Driver Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">First Name<span style="color:red">*</span></label>
                <input type="text" placeholder="First Name" name="fname" class="form-control mb" required value="<?php echo $rows['driver_fname'];?>">
            </div>
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Last Name<span style="color:red">*</span></label>
                <input type="text" placeholder="Last Name" name="lname" class="form-control mb" required value="<?php echo $rows['driver_lname'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Gender<span style="color:red">*</span></label>
                <select name="gender" class="form-control mb" required selected="<?php echo $rows['gender'];?>">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Age<span style="color:red">*</span></label>
                <input type="number" placeholder="Age" name="age" class="form-control mb" required value="<?php echo $rows['age'];?>"><span class="text-danger"><?php if(isset($age_error)) echo $age_error; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Marital Status<span style="color:red">*</span></label>
                <select name="m_status" class="form-control mb" required selected="<?php echo $rows['marital_status'];?>">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Phone<span style="color:red">*</span></label>
                <input type="text" pattern="[0-9]{10}" title="Phone number must be digits and 10 numbers" placeholder="Phone Number" name="phone" class="form-control mb" required value="<?php echo $rows['phone'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Driver Licence<span style="color:red">*</span></label>
                <input type="text" placeholder="Driver Licence" name="d_licence" class="form-control mb" required value="<?php echo $rows['license_number'];?>"><span class="text-danger"><?php if(isset($d_licence_error)) echo $d_licence_error; ?></span>
            </div>
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Licence Deadline<span style="color:red">*</span></label>
                <input type="date" name="licence_d" class="form-control mb" required value="<?php echo $rows['license_deadline'];?>"> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Vehicle ID<span style="color:red">*</span></label>
                <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb" required value="<?php echo $rows['vehicle_ID'];?>"><span class="text-danger"><?php if(isset($vehicleid_error)) echo $vehicleid_error; ?></span>
            </div>
            <div class="col-md-6">
                <label for="" class="text-uppercase text-sm">Password<span style="color:red">*</span></label>
                <input type="password" placeholder="Password" name="password" class="form-control mb" required value="<?php echo $rows['password'];?>"><span class="text-danger"><?php if(isset($password_error)) echo $password_error; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <button class="btn btn-primary btn-block" name="register" type="submit">Submit</button>
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