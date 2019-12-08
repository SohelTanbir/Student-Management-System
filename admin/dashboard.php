<?php 
session_start();
if(!isset($_SESSION['user_login'])){
	header('location:login.php');
}

?>
<?php 
	require_once 'db_con.php';
	// student counting 
	$student_data=mysqli_query($conn,"SELECT * FROM `student_info`");
	$student_row=mysqli_num_rows($student_data);
	// user counting 
	$user_data=mysqli_query($conn,"SELECT * FROM user");
	$user_row=mysqli_num_rows($user_data);
	
	
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
					<li><a href="registration.php"><i class="fas fa-user-plus"></i>Add User</a></li>
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
				<h1 class="text-primary"><i class="fa fa-users"></i> Dashboard <small>Statistics Overview</small> </h1>
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-users"></i> Dashboard</li>
				</ol>
			</div>
			
			
			<div class="row">
				<div class="col-sm-4">
					<div class="panel bg-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i style="padding:10px; color:white; margin-left:10px;" class="fa fa-users fa-5x "></i>
								</div>
								<div class="col-xs-9">
									<div class="pull-right " style="color:white; margin-left:70px;padding:5px; font-size:22px">
										<p style="margin-left:50px;font-size:35px;"><?=$student_row;?></p>
										<p>All Students</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a href="all-student.php">
						<div class="panel-footer bg-dark">
							<span class="pull-left" style="color:white; font-size:22px;"> View All Student</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
							
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<div class="panel bg-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i style="padding:10px; color:white; margin-left:10px;" class="fa fa-users fa-5x "></i>
								</div>
								<div class="col-xs-9">
									<div class="pull-right " style="color:white; margin-left:70px;padding:5px; font-size:22px">
										<p style="margin-left:50px;font-size:35px;"><?=$student_row;?></p>
										<p>All Students</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a href="all-student.php">
						<div class="panel-footer bg-dark">
							<span class="pull-left" style="color:white; font-size:22px;"> View All Student</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
							
						</div>
					</a>
				</div>
								<div class="col-sm-4">
					<div class="panel bg-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i style="padding:10px; color:white; margin-left:10px;" class="fa fa-users fa-5x "></i>
								</div>
								<div class="col-xs-9">
									<div class="pull-right " style="color:white; margin-left:70px;padding:5px; font-size:22px">
										<p style="margin-left:50px; font-size:35px;"><?=$user_row;?></p>
										<p>All Users</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a href="all-users.php">
						<div class="panel-footer bg-dark">
							<span class="pull-left" style="color:white; font-size:22px;"> View All Users</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
							
						</div>
					</a>
				</div>
			</div>
			
			<hr/>
			<!--------- Student Table ----------------->
			<h3>New Student </h3>
			<table id="data" class="table text-center table-striped data" border="1">
				<thead class="bg-info text-white">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Roll</th>
						<th>City</th>
						<th>Contact</th>
						<th>Photo</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query="SELECT * FROM student_info";
						$data=mysqli_query($conn,$query);
						while($row=mysqli_fetch_assoc($data)){?>
					
				
					<tr>
						<td><?php echo $row['id']?></td>
						<td><?php echo ucwords($row['Name'])?></td>
						<td><?php echo $row['Roll']?></td>
						<td><?php echo ucwords($row['City'])?></td>
						<td><?php echo $row['pcontact']?></td>
						<td ><img src="../image/stemp size.jpg" style="width:100px; height:50px" alt="" /></td>
					</tr>
						<?php
						}
					?>
				</tbody>
			
			</table>
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