<?php
$servername="localhost";
$username="root";
$password="";
$db_name="sms_project";

$conn =new mysqli($servername,$username,$password,$db_name);
if($conn){
}else{
	die("Connection faield".mysqli_connect_error());
}

?>