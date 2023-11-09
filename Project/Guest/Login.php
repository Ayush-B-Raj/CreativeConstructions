<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
 $loginemail=$_POST['txt_email'];
 $loginpassword=$_POST['txt_password'];
 $selAdmin="select * from tbl_admin where admin_email='".$loginemail."' and admin_password='".$loginpassword."'";
	$selUser="select * from tbl_user where user_email='".$loginemail."' and user_password='".$loginpassword."'";
	$selEngineer="select * from tbl_engineer where engineer_email='".$loginemail."' and engineer_password='".$loginpassword."'";
	$selSupervisor="select * from tbl_supervisor where supervisor_email='".$loginemail."' and supervisor_password='".$loginpassword."'";
	$resAdmin=$conn->query($selAdmin);
	$resUser=$conn->query($selUser);
	$resEngineer=$conn->query($selEngineer);
	$resSupervisor=$conn->query($selSupervisor);
	if($resAdmin->num_rows>0)
	{
		$data=$resAdmin->fetch_assoc();
		$_SESSION['aid']=$data['admin_id'];
		$_SESSION['aname']=$data['admin_name'];
		header("location: ../Admin/Site.php");
	}
	else if($resUser->num_rows>0)
	{
		$data=$resUser->fetch_assoc();
		$_SESSION['uid']=$data['user_id'];
		$_SESSION['uname']=$data['user_name'];
		header("location: ../User/Homepage.php");
	}
	else if($resEngineer->num_rows>0)
	{
		$data=$resEngineer->fetch_assoc();
		$_SESSION['eid']=$data['engineer_id'];
		$_SESSION['ename']=$data['engineer_name'];
		header("location: ../Engineer/Homepage.php");
	}
	else if($resSupervisor->num_rows>0)
	{
		$data=$resSupervisor->fetch_assoc();
		$_SESSION['sid']=$data['supervisor_id'];
		$_SESSION['sname']=$data['supervisor_name'];
		header("location: ../Supervisor/Homepage.php");
	}
	else{
		echo "<script>alert('Invalid Credentials')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>

			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
						<h1><b>CREATIVE CONSTRUCTIONS</b></h1>
					</div>
					<div class="heading mb-4">
						<h4>Login into your account</h4>
					</div>
					<form method="post" autocomplete="off">
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="txt_email"  placeholder="Email Address" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="txt_password"  placeholder="Password" required>
						</div>
						<div class="row mb-3">
							
						</div>
						<div class="text-left mb-3">
							<button type="submit" name="btn_submit"   class="btn">Login</button>
						</div>
						<div class="text-center mb-2">
							
						<div style="color: #777">Don't have an account
							<a href="../index.php" class="register-link">Back To Home</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
