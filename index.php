<!DOCTYPE html>
<html lang="en-US">
<heade>
	<meta charset="UTP-8"/>
	<title>Student Mangement System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</heade>
<body>
<div class="container">
<br/>
<a class="btn btn-primary loginbtn" href="admin/login.php">Admin Login</a>
<br/>

<h1 class="text-center">Welcome To Student Management System</h1><br/><br/>
	<form action="" method="POST"> 
		<table border="2">
			<tr>
				<th colspan="2"><label>Student Information</label></th>
			</tr>
			<tr>
				<td class="text-center" for="Select Semeste"><label>Select Semester</label></td>
				<td>
					<select class="form-control" id="Select Semeste"" name="Semester">
						<option value="">Select</option>
						<option value="1st">1st Semester</option>
						<option value="2">2nd Semester</option>
						<option value="3rd">3rd Semester</option>
						<option value="4th">4th Semester</option>
						<option value="5th">5th Semester</option>
						<option value="6th">6th Semester</option>
						<option value="7th">7th Semester</option>
						<option value="8th">8th Semester</option>
					<select>
				</td>
			</tr>
			<tr>
				<td class="text-center" for="Roll"><label>Roll<label></td>
				<td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Enter Your Roll" pattern=[0-9]{6}/></td>
			</tr>
			<tr>
				<td class="text-center p-2" colspan="2"><input type="submit" name="show_info" value="Show info"/></td>
			</tr>
		</table>
	</form>
	<br />
	<br />
<!------- Student Result show ------->
<?php 
require_once 'admin/db_con.php';

$semester=$roll="";

if(isset($_POST['show_info'])){
	$semester=$_POST['Semester'];
	$roll= $_POST['roll'];
		
	$result=mysqli_query($conn,"SELECT * FROM `student_info` WHERE `Class`='$semester' and `Roll`='$roll';");
	if(mysqli_num_rows($result)==1){
		$data=mysqli_fetch_assoc($result);
		?>
			
			<div class="row">
	<div class="col-sm-8">
		<table class="table table-borderd" border="1" style="margin-left:25%;">
			<tr colspan="5">
			
				<td rowspan="5">
					<img src="image/stemp size.jpg" alt="" style="width:200px;" class="img-thumbnail"/>
				</td>
				<td>Name</td>
				<td><?php echo $data['Name'];?></td>
			</tr>
			<tr>
				<td>Class</td>
				<td><?php echo $data['Class'];?></td>
			</tr>
			<tr>
				<td>City</td>
				<td><?php echo $data['City'];?></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><?php echo $data['pcontact'];?></td>
			</tr>
		</table>
	
	</div>

</div>

	<?php 
}else{
	?>
	<script type="text/javascript">
		alert('Data Not Found');
	</script>
	<?php 
}

}
?>

</div>













<!-------- All js file linking here --------->
<script src="js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>