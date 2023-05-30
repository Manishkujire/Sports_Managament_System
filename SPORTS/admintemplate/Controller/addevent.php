<?php
define('DIR','../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if(isset($_POST['save']))
{
	$ename=$_POST['ename'];
	$place=$_POST['place'];
	$date=$_POST['date'];
	$sport=$_POST['sport'];
	$stmt=$admin->cud("INSERT INTO `event`(`ename`,`place`,`date`,`sport`) VALUES ('".$ename."','".$place."','".$date."','".$sport."')","saved");
    echo "<script>alert('data saved');</script>";
    $admin->redirect('../viewevent');
}
?>