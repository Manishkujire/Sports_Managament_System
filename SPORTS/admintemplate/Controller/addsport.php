<?php
define('DIR','../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if(isset($_POST['save']))
{
	$sname=$_POST['sname'];
	$type=$_POST['type'];	
	$stmt=$admin->cud("INSERT INTO `sport`(`sname`,`type`) VALUES ('".$sname."','".$type."')","saved");
    echo "<script>alert('data saved');</script>";
    $admin->redirect('../viewsport');
}
?>