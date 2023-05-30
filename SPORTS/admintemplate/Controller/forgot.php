<?php
define('DIR','../');
require_once DIR .'config.php';
$contol = new Controller();
$admin = new Admin();
if (isset($_POST['submit'])) 
{
  $phno = $_POST['phno'];  
  $rno= $_POST['rno']; 
  $stmt=$admin->ret("SELECT * FROM `student` where rollno='$rno'and contno='$phno'");
  $row=$stmt->fetch(PDO::FETCH_ASSOC);  
  $num=$stmt->rowCount();
  if($num>0){
  $pass=$row['password'];
  echo "<script>alert('data saved');window.location='../../notification/sendsms.php?p=".$phno."&pass=".$pass."';</script>";
   }
  else
  	{
  	echo "please check your username and password";
  	}
}
?>