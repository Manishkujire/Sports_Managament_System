<?php
define('DIR','../');
require_once DIR . 'config.php';

$control = new Controller(); 
$admin = new Admin();

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
	$place=$_POST['place'];
	$gender=$_POST['gender'];
	$password=$_POST['password'];
	
	$stmt=$admin->cud("INSERT INTO `reg`(`name`, `email`, `dob`, `phone`, `place`, `gender`, `password`) VALUES ('".$name."','".$email."','".$dob."','".$phone."','".$place."','".$gender."','".$password."')","saved");

	echo "<script>alert('data saved');</script>";
}

?>