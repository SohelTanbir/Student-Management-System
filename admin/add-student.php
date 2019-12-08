<?php 
session_start();
if(!isset($_SESSION['user_login'])){
	header('location:login.php');
}
?>
<?php 
include('db_con.php');
//// veriable diclearation here
$err_name=$err_roll=$err_class=$err_city=$less_roll=$err_contact=$data_insert="";
 $name=$roll=$class=$city= $contact=$photo="";

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	

	
	
	$photo= $_POST['photo'];
}
if(empty($_POST['stname'])){
	$err_name="The name field is required";
}	
else{
	$name=$_POST['stname'];
	
}
if(empty($_POST['roll'])){
	$err_roll="The roll field is required";
}
else{
	$roll= $_POST['roll'];
	
}
if(empty($_POST['class'])){
	$err_class="The class field is required";
}
else{
		$class= $_POST['class'];
}
if(empty($_POST['city'])){
	$err_city="The city field is required";
}else{
	$city= $_POST['city'];
}
if(empty($_POST['contact'])){
	 $err_contact="The contact field is required";
}else{
	$contact= $_POST['contact'];
}


if(empty($err_name) & empty($err_roll) & empty($err_class) & empty($err_city) & empty($err_contact)){
	if(strlen($roll)>5 & strlen($roll)<7){
	$query="insert into student_info(Name,Roll,Class,City,pcontact,Photos)VALUES('$name','$roll','$class','$city','$contact','$photo')";
			$result=mysqli_query($conn,$query);
			if($result){
				$data_insert="Data Insert into Database";
		}else{
			$data_insert="Data Not Insert";
		}
	}else{
		$less_roll="Roll Must be 6 Digit";
	}
	
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
		<div class="col-md-9">
			<div class="contet">
				<h1 class="text-primary"><i class="fa fa-user-plus"></i>Add New Student <small>Statistics Overview</small> </h1>
				<ol class="breadcrumb">
					<a href="dashboard.php"><li class="active"><i class="fa fa-users"></i> Dashboard </li></a>
					<li class="active"><i class="fa fa-user-plus"></i> Add New Student </li>
				</ol>
			</div>
			<hr/>
		<p style="color:blue;font-weight:bold; font-size:25px;"><?php echo $data_insert;?></p>
			<div class="col-sm-6 col-sm-6-offset">
					<form action="" method="POST" enctype="multiple/form-data">
						<div class="form-group">
							<label for="stname">Student Name</label>
							<input  class="form-control" type="text" name="stname" id="stname"  placeholder="Student Name"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_name;?></p>
						</div>
						
						<div class="form-group">
							<label for="roll">Roll</label>
							<input  class="form-control" type="text" name="roll" id="roll"  placeholder="Enter 6 Digit Roll"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_roll;?></p>
							<p style="color:red;font-weight:bold;"><?php echo $less_roll;?></p>
						</div>
						
						<div class="form-group">
							<label for="class">Class</label>
							<select name="class" id="class" class="form-control">
								<option value="">Select Your Class</option>
								<option value="1st">1st</option>
								<option value="2nd">2nd</option>
								<option value="3rd">3rd</option>
								<option value="4th">4th</option>
								<option value="5th">5th</option>
						
							</select>
							<p style="color:red;font-weight:bold;"><?php echo $err_class;?></p>
						</div>
						
						<div class="form-group">
							<label for="city">City</label>
							<input  class="form-control" type="text" name="city" id="city"  placeholder="City Name"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_city;?></p>
						</div>
						
						<div class="form-group">
							<label for="contact">Contact</label>
							<input  class="form-control" type="text" name="contact" id="contact"  placeholder="01*********  " pattern="01[3][5][6][7][8][9]{0-9}"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_contact;?></p>
						</div>
						<div class="form-group">
							<label for="photo">Photo</label>
							<input  class="form-control" type="file" name="photo" id="photo"  placeholder="Your Photo"/>
						</div>
						<div class="form-group">
							<input style="float:right; margin-bottom:30px;" class="btn btn-primary pull-right" type="submit" name="submit" value="Add Student"/>
						</div>
					</form>
				</div>
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
		