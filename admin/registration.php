<?php 
include('db_con.php');
session_start();
/// veriable declearation
$err_name=$err_email=$err_password=$err_con_pass=$err_uname=$inser_data="";

	if($_SERVER['REQUEST_METHOD']=='POST'){
			$name=$_REQUEST['name'];
			$email=$_REQUEST['email'];
			$password=$_REQUEST['password'];
			$con_password=$_REQUEST['con_password'];
			$uname=$_REQUEST['uname'];
			$photo=$_REQUEST['photo'];
	
		if(empty($_POST['name'])){
			 $err_name="The Name field is required";
		}
		if(empty($_POST['email'])){
			 $err_email="The email field is required";
		}
		if(empty($_POST['password'])){
			 $err_password="The password field is required";
		}
		if(empty($_POST['con_password'])){
			 $err_con_pass="The Confirm password field is required";
		}
		if(empty($_POST['uname'])){
			  $err_uname="The Username field is required";
		}
		/// Email validation 

		if(empty($err_input)){
			/// Email Validation here 
			$email_check=mysqli_query($conn,"SELECT * FROM `user` WHERE `Email`='$email';");
			if(mysqli_num_rows($email_check)==0){
								/// User name validation here 
			$uname_check=mysqli_query($conn,"SELECT *FROM user where User_name='$uname';");
			if(mysqli_num_rows($uname_check)==0){
				if(strlen($uname)>7){
				if(strlen($password)>5){
				if($password==$con_password){
					$password =md5($password);
					$query="INSERT INTO user(`Name`, `Email`, `Password`, `User_name`, `Photos`, `Status`) VALUES ('$name','$email','$password','$uname','$photo','inactive')";
					$result=mysqli_query($conn,$query);
					if($result){
						$inser_data="Your Data insert Successfully In Database!";
					}else{
						$inser_data="Data Not Insert into Database";
					}
					
				}else{
					$err_con_pass="Confirm Password Not Match";
				}
			}else{
				$err_password= "Password more then 6 Charecter";
			}
				}else{
				 $err_uname="Username must not less then 8 Charecter";
				}
			}
			else{
			 $err_uname="This Username Already Exists!Try Another!";
			}
			}else{
				$err_email= "The email already exists";
			}
			
		}
		
	}

?>


<!DOCTYPE html>
<html lang="en-US">
<heade>
	<meta charset="UTP-8"/>
	<title>Student Mangement System</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../css/animate.css" rel="stylesheet" type="text/css"/>
	<link href="../fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
	<link href="registration.css" rel="stylesheet" type="text/css"/>
</heade>
<body>
<br/>
<div class="container ">
	<h1 class="text-center">User Registration Form </h1>
	<p class="text-center"><?php echo $inser_data?></p>
	<hr/>
	<div class="regi_form">
		<form action="" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="name" class="control-label">Name</label>
		
				<input type="text" id="name" value="<?php if(isset($name)){ echo $name;}?>" class="form-control" name="name" placeholder="Enter Your Name"/>
				<p><?php echo  $err_name;?></p>
			</div>
			<div class="form-group">
				<label for="email" class="control-label">Email</label>
				<input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" value="<?php if(isset($email)){ echo $email;}?>"/>
				<p><?php echo  $err_email;?></p>
			</div>
			
			<div class="form-group">
				<label for="password" class="control-label">Password</label>
				<input type="password" id="password" class="form-control" name="password" placeholder="Enter Your Password"  value="<?php if(isset($password)){ echo $password;}?>"/>
				<p><?php echo  $err_password;?></p>
				
			</div>
			
			<div class="form-group">
				<label for="con_password" class="control-label">Confirm Password</label>
				<input type="password" id="con_password" class="form-control" name="con_password" placeholder="Enter Your Confirm Password" value="<?php if(isset($con_password)){ echo $con_password;}?>"/>
				<p><?php echo  $err_con_pass;?></p>
			</div>
			
			<div class="form-group">
				<label for="uname" class="control-label">User Name</label>
				<input type="text" id="uname" class="form-control" name="uname" placeholder="Enter Your User Name"  value="<?php if(isset($uname)){ echo $uname;}?>"/>
				<p><?php echo  $err_uname;?></p>
				
			</div>
			<div class="form-group">
				<label for="photos" class="control-label">Photo</label>
				<input type="file" id="photos" class="form-control" name="photo" />
			</div>
			<input type="submit" name="submit" class="btn btn-info" value="Submit Now"/>
			<input type="reset" class="btn btn-danger" value="Reset"/>
		</form>
		<br/>
		<p>If You have any Account?<a href="login.php">Login </a></p>
	</div>
		<hr />
		<footer>
			<p class="text-center">Copyright&copy;2017-<?php echo date('Y');?> All Right Reserved</p>
		</footer>
</div>












<!-------- All js file linking here --------->
<script src="js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>