<?php 
session_start();
if(!isset($_SESSION['user_login'])){
	header('location:login.php');
}

?>
<?php 
	require_once 'db_con.php';
	 $user=$_SESSION['user_login'];
	$user_data=mysqli_query($conn,"select *from user where User_name='$user';");
	$user_row=mysqli_fetch_assoc($user_data);
	
	
	/// user profile image upload
	if(isset($_POST['upload'])){
		$photo=$_POST['upload'];
		$upload=mysqli_query($conn,"update user set Photos='$photo' where User_name='$user';");
		if($upload){
		
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en-US">
<heade>
	<meta charset="UTP-8"/>
	<title>Student Mangement System</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
	<link href="../fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="dashboard.css" type="text/css"/>
	

</heade>
<body>
<header>
		<div class="row">
			<div class="col-md-4">
				<div class="titlebar">
				<ul>
					<li><a href="#">SMS Dashboard</a></li>
				</ul>
			</div>
			</div>
		<div class="col-md-8">
			<div class="admin_area">
				<ul>
					<li><a href="#">Welcome: <i class="fas fa-user"></i> SohelRana</a></li>
					<li><a href="#"><i class="fas fa-user-plus"></i>Add User</a></li>
					<li><a href="profile.php"><i class="fas fa-user"></i>Profile</a></li>
					<li><a href="logout.php"><i class="fas fa-power-off"></i>Logout</a></li>
				</ul>
			</div>
		</div>
</div>	
</header>
<br/>
<main>
<div class="container-fluid ">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
				<a href="dashboard.php" class="list-group-item active"><i class="fa fa-users"></i> Dashboard</a>
				<a href="add-student.php" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
				<a href="all-student.php" class="list-group-item"><i class="fa fa-users"></i> All Students</a>
				<a href="all-users.php" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
			</div>
			<?php 
			 
			 if(isset($_GET['page'])){
				 $page=$_GET['page'].'.php';
			 }else{
				 $page='dashboard.php';
			 }
			?>
		</div>
		<div class="col-md-9">
			<div class="contet">
				<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>Statistics Overview</small> </h1>
				<ol class="breadcrumb">
					<li><a href="Dashboard.php"><i class="fa fa-user"></i>Dashboard</a></li>
					&nbsp;
					<li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
				</ol>
			</div>
			<hr/>
				<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User ID</td>
				<td><?php echo $user_row['id'];?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo $user_row['Name'];?></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><?php echo $user_row['User_name'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $user_row['Email'];?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo $user_row['Status'];?></td>
			</tr>
			<tr>
				<td>Sign Up Date</td>
				<td><?php echo $user_row['date_time'];?></td>
			</tr>
		
		
		</table>
		<a style="float:right;" href="#" class="btn btn-info "><i class="fas fa-user "></i> Edit Profile</a>
	
	</div>
	<div class="col-sm-6">
		<a href="#">
			<img class="img-thumbnail" src="../image/stemp size.jpg" alt="" />
		</a>
		<form action="" method="POST">
			<label for="profile">Profile Picture</label><br/>
			<input type="file" name="pphoto" id="profile" class="form-control"/><br/>
			<input type="submit" value="Updload" name="upload" class="btn btn-info" />
		</form>
	</div>
</div>
			
		</div>
	</div>	
</div>

</main>





<footer class="bg-primary text-center">
	<p>SR Software Academy &copy;All Right Reserved</p>
</footer>
<!-------- All js file linking here --------->
<script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="../js/script.js" type="text/javascript"></script>

<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>