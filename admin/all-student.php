<?php 
require_once 'db_con.php';

session_start();
if(!isset($_SESSION['user_login'])){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<heade>
	<meta charset="UTP-8"/>
	<title>Student Mangement System</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
					<li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
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
		<div class="col-sm-9">
					<div class="contet">
				<h1 class="text-primary"><i class="fa fa-users"></i>All Student <small>Statistics Overview</small> </h1>
				<ol class="breadcrumb">
					<a href="dashboard.php"><li class="active"><i class="fa fa-users"></i> Dashboard </li></a>
					<li class="active"><i class="fa fa-user-plus"></i> <a href="add-student.php">Add New Student </a> </li>
				
				</ol>
			</div>
			<hr/>
			<table id="data" class="table text-center table-striped data" border="1">
				<thead class="bg-info text-white">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Roll</th>
						<th>Class</th>
						<th>City</th>
						<th>Contact</th>
						<th>Photo</th>
						<th>Action</th>
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
						<td><?php echo $row['Class']?></td>
						<td><?php echo ucwords($row['City'])?></td>
						<td><?php echo $row['pcontact']?></td>
						<td ><img src="../image/stemp size.jpg" style="width:100px; height:50px" alt="" /></td>
						<td> 
							<a href="update.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-warning"><i class="fas fa-edit"> Edit</i></a>
							&nbsp;&nbsp; 
							|| 
							&nbsp;&nbsp;
							<a href="delete_student.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-danger"><i class="fas fa-trash"> Delete</i></a>
						</td>
				
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
<script src="js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>