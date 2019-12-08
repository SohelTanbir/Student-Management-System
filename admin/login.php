<?php 
include('db_con.php');
session_start();
if(isset($_SESSION['user_login'])){
	header('location:dashboard.php');
}
$usename=$password="";
$err_username=$err_password="";
if($_SERVER['REQUEST_METHOD']=='POST'){
		$usename=$_REQUEST['usename'];
		$password=$_REQUEST['password'];
	if(empty($usename)){
	$err_username="The Username field is Required";
	}
	if(empty($usename)){
	$err_password="The Password field is Required";
	}
	
	//// username and password matching here
	if(empty($err_username) && empty($err_password)){
		//// username matching 
		$query="Select *from user where User_name='$usename';";
		$username_macthing=mysqli_query($conn,$query);
		if(mysqli_num_rows($username_macthing)==1){
			
		 $row=mysqli_fetch_assoc($username_macthing);
		 if($row['Password']==md5($password)){
			 if($row['Status']=='active'){
				 $_SESSION['user_login']=$usename;
				header('location:dashboard.php');
			 }else{
				 $err_password='The Username is inactive !';
			 }
			 
		
		 }else{
			 $err_password= "Wrong Password !";
		 }
			
		}else{
			 $err_username="This Username not found!";
		}
	}
}
/* $password=md5($password);
			$query="Select *from user where password='$password';";
			$password_matching=mysqli_query($conn,$query);
			if($password_matching==$password){
				header('location:index.php');
			}else{
				$err_password="Incorect Password !";
			}
 */
?>

<!DOCTYPE html>
<html lang="en-US">
<heade>
	<meta charset="UTP-8"/>
	<title>Student Mangement System</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../css/animate.css" rel="stylesheet" type="text/css"/>
	<link href="../fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
	<link href="style.css" rel="stylesheet" type="text/css"/>
</heade>
<body>
<div class="container animated shake">
	<div class="row">
	
	</div>
<br/>
<h1 class="text-center ">Welcome To Student Management System</h1>
<hr/>
<br/><br/>
	<div class="form_area">
		<form action="login.php" method="POST"> 
		<h3 class="text-center" style="color:red">Admin Login Form</h3>
		<div class="user_name"><br/>
			<input type="text" name="usename" class="form-control" placeholder="Enter Username" value="<?php if(isset($usename)){echo $usename;}?>"/>
			<p style="color:red"><?php echo $err_username;?></p>
	
		</div>
		<div class="password"><br/>
			<input type="password" name="password" class="form-control" placeholder="Enter Password"/>
			<p style="color:red"><?php echo $err_password;?></p>
		</div><br/>
		<input type="submit" name="submit" value="Login" class="btn btn-info"/>
		<p>If You have no Account?<a href="registration.php"> Registration</a></p>
	
	</form>
	
	</div>
</div>












<!-------- All js file linking here --------->
<script src="js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>