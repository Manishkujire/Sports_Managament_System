<?php
define('DIR','../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if(isset($_POST['save']))
{
	$name=$_POST['name'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$sport=$_POST['sport'];
	$username=$_POST['username'];
    $password=md5($_POST['password']);
	$stmt=$admin->cud("INSERT INTO `coaches`(`name`,`age`,`gender`,`address`,`phone`, `sport`,`username`,`password`) VALUES ('".$name."','".$age."','".$gender."','".$address."','".$phone."','".$sport."','".$username."','".$password."')","saved");
    echo "<script>alert('data saved');</script>";
    $admin->redirect('../viewcoach');
}
?>