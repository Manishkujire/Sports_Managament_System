<?php
define('DIR','../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if(isset($_POST['save']))
{
	$pid=$_POST['pid'];
	$sport=$_POST['sport'];
	$competition=$_POST['competition'];
	$level=$_POST['level'];
	$position=$_POST['position'];
	$year=$_POST['year'];
	$stmt=$admin->cud("INSERT INTO `achivements`(`pid`,`competition`,`level`, `position`,`year`,`sport`) VALUES ('".$pid."','".$competition."','".$level."','".$position."','".$year."','".$sport."')","saved");
    echo "<script>alert('data saved');</script>";
    $admin->redirect('../viewachive');
}
?>