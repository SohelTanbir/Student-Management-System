<?php 
require_once 'db_con.php';

$id=base64_decode( $_GET['id']);
$delet=mysqli_query($conn,"DELETE FROM `student_info` WHERE `id`='$id';");
if($delet){
	header('location:all-student.php');
	$data_insert="Delete Successfull";
}else{
	echo "Not Delete";
	
}





?>