<?php

session_start();
require('includes/config.php');
include('includes/functions.php');
$uname = $pass = false;
if(isset($_POST['login'])){
    
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
    if($uname){
        switch($uname){
            case $uname == "admin":
                
                $q = "SELECT * FROM `userlogin_tbl` WHERE user_name = '$uname' ";
                $result = @mysqli_query($conn, $q);
                if($result){
                    $rows = mysqli_num_rows($result);
                }else{
                    $error = "Login Unsuccessful";
                }
                if($rows){
                    while($rows = mysqli_fetch_array($result)){
                        $tbl_uid = $rows['user_ID'];
                        $tbl_user_name = $rows['user_name'];
                        $tbl_pass = $rows['password'];
                    }
                }
                mysqli_close($conn);
                if($pass == $tbl_pass){
                    $_SESSION['alogin'] = $uname;
                    redirect_to('admin/dashboard.php');
                }else{
                    echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
                }
                
                break;
                
            case $uname == "driver":
                $q = "SELECT * FROM `userlogin_tbl` WHERE user_name = '$uname' ";
                $result = @mysqli_query($conn, $q);
                if($result){
                    $rows = mysqli_num_rows($result);
                }else{
                    $error = "Login Unsuccessful";
                }
                if($rows){
                    while($rows = mysqli_fetch_array($result)){
                        $tbl_uid = $rows['user_ID'];
                        $tbl_user_name = $rows['user_name'];
                        $tbl_pass = $rows['password'];
                    }
                }
                mysqli_close($conn);
                if($pass == $tbl_pass){
                    $_SESSION['dlogin'] = $uname;
                    redirect_to('driver/dashboard.php');
                }else{
                    echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
                }
                
                break;
            case $uname == "dues collector":
                $q = "SELECT * FROM `userlogin_tbl` WHERE user_name = '$uname' ";
                $result = @mysqli_query($conn, $q);
                if($result){
                    $rows = mysqli_num_rows($result);
                }else{
                    $error = "Login Unsuccessful";
                }
                if($rows){
                    while($rows = mysqli_fetch_array($result)){
                        $tbl_uid = $rows['user_ID'];
                        $tbl_user_name = $rows['user_name'];
                        $tbl_pass = $rows['password'];
                    }
                }
                mysqli_close($conn);
                if($pass == $tbl_pass){
                    redirect_to('duesCollector/dashboard.php');
                    $_SESSION['dclogin'] = $uname;
                }else{
                    echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
                }
                
                break;
        }
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
	
	<title>Landing Page</title>
<!-- Wow and Animate Stye -->
    <link rel="stylesheet" href="/css/wow%2520and%2520animate/animate.min.css">
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animate.min.css">
    
	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
        body {
            background-image: url(images/bg2.JPG);
        }
        
        .b{
            background-color: darkgoldenrod;
            opacity: 4.2;
            font-family: 'Lovers Quarrel', cursive;
        }
        
        h1, h3, h4 {
            font-family: 'Lovers Quarrel', cursive;
        }
        
        .h {
            padding-top: 60px;
        }
        
        .bn{
            width: 60%;
            background-color: darkgoldenrod;
            opacity: 1.2;
            border-radius: 20;
        }
        
        .bn hover {
            background-color: darkgoldenrod;
            opacity: 4.2;
        }
        
        .he{
            color:white;
            opacity: 1.2;
        }
        
        .i {
            width: 30px;
            height: 20px;
        }
        
        ::placeholder {
            color: red;
            opacity: 7.0;
        }
        :-ms-input-placeholder {
            color: red;
            opacity: 7.0;
        }
        ::-ms-input-placeholder {
            color:red;
            opacity: 7.0;
        }
        .f {
            background: white;
        }
        
        .ab{
            align-self: center;
            padding-left: 25%;
            padding-top: 8%;
        }
        
        
        input[type="text"], input[type="password"] {
    background: darkgoldenrod;
    border: none;
    border-bottom: 2px solid #fff;
    color: #fff;
    border-radius: 20px;
    outline: none;
    opacity: 10.0;
    font-family: 'Lovers Quarrel', cursive;
}

input[type="text"]:focus, input[type="password"]:focus {
    background: darkgoldenrod;
    opacity: 100%;
    font-family: 'Lovers Quarrel', cursive;
}
	</style>
</head>

<body>

	<div class="container">
          <div class="row"><h1 class="text-center text-bold">Chraa Taxi Station Management System</h1>
              <div class="col-md-4 col-sm-4 col-xs-12"></div>
              <div class="col-md-4 c0l-sm-4 col-xs-12">
              <!--form start-->
                  
                 <form class="form-container f" method="post" >
                    <h3 class="text-bold">LogIn Here</h3> 
                    <div class="form-group">
                       <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                    </div>
                    <div class="form-group">
                       <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                    </div>
                    
                    <button name="login" type="submit" class="btn btn-dark btn-block b">LogIn</button>
                </form>
              <!--form end-->
                  <div>
                    <div class="animated flash delay-0s ab">
                        <h4 class="he animated bounce delay-2s">Are You A Passenger?</h4>
                        <a href="comment.php"><button class="btn btn-dark btn-block bn">Send a Complaint <i class="fa fa-send-o i"></i></button></a>
                    </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12 "></div>
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
