<?php
define('DIR','../');
require_once DIR .'config.php';
$contol = new Controller();
$admin = new Admin();
if (isset($_POST['submit'])) 
{
  $name = $_POST['name'];  
  $pwd = $_POST['password']; 
  $stmt=$admin->ret("SELECT * FROM `student` where name='$name'and password='$pwd'");
  $row=$stmt->fetch(PDO::FETCH_ASSOC);  
  $num=$stmt->rowCount();
  if($num>0){
   $_SESSION['student']=$row['rollno'];
   $admin->redirect('../student/index');
}
  else
  	{
  	echo "please check your username and password";
  	}
}
?>