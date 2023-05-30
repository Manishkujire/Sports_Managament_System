<?php
define('DIR','../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if(isset($_POST['save']))
{
    $tid=$_GET['tid'];
    $sport=$_POST['sport'];
	// $player1=$_POST['player1'];	
	// $player2=$_POST['player2'];	
	// $player3=$_POST['player3'];	
	// $player4=$_POST['player4'];	
	$leader=$_POST['leader'];	
	$stmt=$admin->cud("INSERT INTO `team`(`tid`,`leader`,`sport`,`cid`) VALUES ('".$tid."','".$leader."','".$sport."','4')","saved");
    // echo "<script>alert('data saved');</script>";
    // $admin->redirect('../viewteam');
}

?>