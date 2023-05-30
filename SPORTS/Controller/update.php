<?php
define('DIR', '../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();

if (isset($_POST['update']))
{
	# code...
	  $id=$_POST['id'];		     
     $name=$_POST['name'];
     $email=$_POST['email'];
     $dob=$_POST['dob'];
     $place=$_POST['phone'];
     $phone=$_POST['place'];
     $gender=$_POST['gender'];
     $password=$_POST['password'];

     $stmt = $admin->cud("UPDATE `reg` SET `name`='".$name."',`email`='".$email."',`dob`='".$dob."',`phone`='".$phone."',`place`='".$place."','gender`='".$gender."',`password`='".$password."' WHERE id=".$id,"updated");

         echo "<script>alert('data updated successfully');</script>";
         $admin->redirect('../display');
	


	// $update) 
	
}
?>