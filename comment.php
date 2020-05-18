<?php
error_reporting(0);
include('includes/config.php');
include('includes/functions.php');

if(isset($_POST['submit']))
  {
	
	$name = $_POST['name'];
	$comment = $_POST['Pcomment'];
    $phone = $_POST['phone'];
    $vehicle_id = vid_parsing($_POST['vehicleID']);
	

	$sql="INSERT INTO `passenger_comment_tbl`(`comment_number`, `comment`, `passenger_name`, `phone`, `vehicle_ID`) VALUES ('','$comment', '$name', '$phone', '$vehicle_id')";
    
    if($name && $comment && $phone && $vehicle_id){
        $result = @mysqli_query($conn, $sql);
    }
	
    if($result){
        $msg="Comment Sent Successfully, Thanks for bringing this to our attention!";
        
        #insert into notification table
        $notireceiver = 'Admin';
        $notitype = "Passenger Comment";
        $notiql="INSERT INTO `notification`(`id`, `user`, `receiver`, `type`) VALUES ('', '$name', '$notireceiver', '$notitype')";
        $res = @mysqli_query($conn, $notiql);
        mysqli_close($conn);
    }else{
        $error = "Comment Send Unsuccessful!";
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
	
	<title>Passenger Comment Entry</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="admin/fonts/google-fonts.css">

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
    h3 {
        text-align: center;
        font-family: 'Lovers Quarrel', cursive;
    }
        .panel-heading{
            font-family: 'Lovers Quarrel', cursive;
        }
    
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        
        body {
            background-color: #000;
            color: white;
        }
        
        .intro {
            height: 100vh;
            background: linear-gradient(45deg, #ff6f69 20%, #3c3c3c 20% 50%, #ffcc5c 50% 80%, #96ceb4 80%);
            align-items: center;
            align-content: center;
        }
        
        
        .t{
            outline: none;
            color: black;
            font-family: 'Lovers Quarrel', cursive;
            border: 0px;
            border: 2px solid #3498db;
            border-radius: 24px;
            transition: 0.25s;
        }
        .t:focus{
            border-color: #2ecc71;
        }
        
        
        .box-area{
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .box-area li{
            position: absolute;
            display: block;
            list-style: none;
            width: 25px;
            height: 25px;
            background: rgba(255,255,255,0.2);
            animation: animate 20s linear infinite alternate;
            bottom: -150px;
        }
        
        .box-area li:nth-child(1){
            left: 86%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }
        .box-area li:nth-child(2){
            left: 12%;
            width: 50px;
            height: 50px;
            animation-delay: 1.5s;
            animation-duration: 10s;
        }
        .box-area li:nth-child(3){
            left: 76%;
            width: 150px;
            height: 150px;
            animation-delay: 5.5s;
        }
        .box-area li:nth-child(4){
            left: 70%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
            animation-duration: 8s;
        }
        .box-area li:nth-child(5){
            left: 65%;
            width: 70px;
            height: 70px;
            animation-delay: 0s;
        }
        .box-area li:nth-child(6){
            left: 15%;
            width: 110px;
            height: 110px;
            animation-delay: 3.5s;
            animation-duration: 5s;
        }
        .box-area li:nth-child(6){
            left: 30%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
            animation-duration: 5s;
        }
        .box-area li:nth-child(6){
            left: 14%;
            width: 195px;
            height: 195px;
            animation-delay: 0s;
            animation-duration: 10s;
        }
        
        @keyframes animate{
            0%{
                transform: translateY(0) rotate(90deg);
                opacity: 1;
            }
            100%{
                transform: translateY(-800px) rotate(360deg);
                opacity: 0;
            }
        }
        
		</style>
</head>

<body>

	<div class="intro animation-area">
        <ul class="box-area">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
            <div class="col-md-8 col-md-offset-2" style="padding-top: 30px;">
        <h3 class="page-title" style="color:white;">Passenger Comment Entry</h3>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Enter Comment</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
    
    <form method="post" class="form-horizontal f" action="#">
        <label for="" class="text-uppercase text-sm">Your Name</label>
        <input type="text" placeholder="Full Name" name="name" class="form-control mb t" required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">

        <label for="" class="text-uppercase text-sm">Phone</label>
        <input type="text" pattern="[0-9]{10}" placeholder="Phone Number" name="phone" class="form-control mb t" required value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                    
        <label for="" class="text-uppercase text-sm">Comment</label>
        <textarea placeholder="Enter Comment..." name="Pcomment" class="form-control mb t" required><?php if(isset($_POST['Pcomment'])) echo $_POST['Pcomment']; ?></textarea>
                                    
        <label for="" class="text-uppercase text-sm">Vehicle ID</label>
        <input type="text" placeholder="Vehicle ID" name="vehicleID" class="form-control mb t" required value="<?php if(isset($_POST['vehicleID'])) echo $_POST['vehicleID']; ?>"><span class="text-danger"><?php if($vehicleid_error) echo "<span class=\"text-danger\">". $vehicleid_error . "</span><br>"?>
        
        <input type="submit" name="submit" class="btn btn-primary btn-block bn" value="Send Complaint"> 
    </form> 
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