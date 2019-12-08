<?php 
require_once 'db_con.php';

/// take student id 
$id=base64_decode( $_GET['id']);

/// Select student data from database
$query="SELECT *FROM student_info where id='$id';";
$data=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($data);

//// update student data here
$err_name=$err_roll=$err_class=$err_city=$less_roll=$err_contact=$data_update="";

if(isset($_POST['update'])){
	$name= $_POST['stname'];
	$roll= $_POST['roll'];
	$class= $_POST['class'];
	$city= $_POST['city'];
	$contact= $_POST['contact'];
}
if(empty($_POST['update'])){
	$err_name="The name field is required";
}
if(empty($_POST['roll'])){
	$err_roll="The roll field is required";
}
if(empty($_POST['class'])){
	$err_class="The class field is required";
}
if(empty($_POST['city'])){
	$err_city="The city field is required";
}
if(empty($_POST['contact'])){
	 $err_contact="The contact field is required";
}


if(empty($err_name) & empty($err_roll) & empty($err_class) & empty($err_city) & empty($err_contact)){
	if(strlen($roll)>5 & strlen($roll)<7){
		$query="UPDATE student_info set Name='$name',Roll='$roll',Class='$class',City='$city',pcontact='$contact' where id='$id';";
		$update=mysqli_query($conn,$query);
		if($update){
			$data_update="Data Update Successfully";
		}else{
			$data_update="Data Not Update";
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
				<h1 class="text-primary"><i class="fas fa-edit"></i> Update Student <small>Statistics Overview</small> </h1>
				<ol class="breadcrumb">
					<a href="dashboard.php"><li class="active"><i class="fa fa-users"></i> Dashboard &nbsp;</li></a>
					 <li class="active"><a href="all-student.php"><i class="fa fa-users"></i> All Student </a></li>
				</ol>
			</div>
			<hr/>
			<p style="color:blue;font-weight:bold; font-size:25px;"><?php echo $data_update;?></p>
			<div class="col-sm-6 col-sm-6-offset">
					<form action="" method="POST" enctype="multiple/form-data">
						<div class="form-group">
							<label for="stname">Student Name</label>
							<input  class="form-control" type="text" name="stname" id="stname"  placeholder="Student Name" value="<?php echo $row['Name'];?>"/>
						</div>
						
						<div class="form-group">
							<label for="roll">Roll</label>
							<input  class="form-control" type="text" name="roll" id="roll"  placeholder="Enter 6 Digit Roll" value="<?php echo $row['Roll'];?>"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_roll;?></p>
							<p style="color:red;font-weight:bold;"><?php echo $less_roll;?></p>
						</div>
						
						<div class="form-group">
							<label for="class">Class</label>
							<select name="class" id="class" class="form-control">
								<option value="">Select Your Class</option>
								<option <?php echo $row['Class']=='1st'? 'selected=""':'';?> value="1st">1st</option>
								<option <?php echo $row['Class']=='2nd'? 'selected=""':'';?> value="2nd">2nd</option>
								<option <?php echo $row['Class']=='3rd'? 'selected=""':'';?> value="3rd">3rd</option>
								<option <?php echo $row['Class']=='4th'? 'selected=""':'';?> value="4th">4th</option>
								<option <?php echo $row['Class']=='5th'? 'selected=""':'';?> value="5th">5th</option>
							</select>
							<p style="color:red;font-weight:bold;"><?php echo $err_class;?></
						</div>
						
						<div class="form-group">
							<label for="city">City</label>
							<input  class="form-control" type="text" name="city" id="city"  placeholder="City Name" value="<?php echo $row['City'];?>"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_city;?></p>
						</div>
						
						<div class="form-group">
							<label for="contact">Contact</label>
							<input  class="form-control" type="text" name="contact" id="contact"  placeholder="01*********  " pattern="01[3][5][6][7][8][9]{0-9}" value="<?php echo $row['pcontact'];?>"/>
							<p style="color:red;font-weight:bold;"><?php echo $err_contact;?></p>
						</div>
						<div class="form-group">
							<input style="float:right; margin-bottom:30px;" class="btn btn-primary pull-right" type="submit" name="update" value="Update Student"/>
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
		