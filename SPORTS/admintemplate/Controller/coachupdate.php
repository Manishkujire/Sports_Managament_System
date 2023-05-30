<?php
define('DIR', '../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if (isset($_POST['update']))
{
	$id = $_GET[ 'id' ];
    $name=$_POST['name'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$sport=$_POST['sport'];
	$username=$_POST['username'];
    $password=md5($_POST['password']);
    $stmt = $admin->cud( "UPDATE `coaches` SET `name` = '$name',`age` = '$age',`gender` = '$gender',`address` = '$address',`phone` = '$phone',`sport` = '$sport',`username` = '$username',`password` = '$password' WHERE `cid`='$id'", 'updated' );
    echo "<script>alert('data updated successfully');</script>";
    $admin->redirect( '../viewcoach' );
}
?>
