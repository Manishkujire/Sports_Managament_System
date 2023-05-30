<?php
define('DIR','../');
require_once DIR .'config.php';
$contol = new Controller();
$admin = new Admin();

if (isset($_POST['submit'])) 
{
   
  $name = $_POST['name'];  
  $pwd = $_POST['pwd']; 

  
  $stmt=$admin->ret("SELECT username, password FROM `admin` where name='$name'and password='$password'");
  $row=$stmt->fetch(PDO::FETCH_ASSOC);  
  
  $num=$stmt->rowCount();
  if($num>0){
   
   
    $admin->redirect('../admintemplate');


  }
  else
  	{
  	echo "please check your username and password";
  	}
}

?>