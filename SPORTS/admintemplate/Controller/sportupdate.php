<?php
define('DIR', '../');
require_once DIR . 'config.php';
$control = new Controller(); 
$admin = new Admin();
if (isset($_POST['update']))
{
	$id = $_GET[ 'id' ];
    $sname = $_POST[ 'sname' ];
    $type = $_POST[ 'type' ];
    $stmt = $admin->cud( "UPDATE `sport` SET `sname` = '$sname',`type` = '$type' WHERE `sid`='$id'", 'updated' );
    echo "<script>alert('data updated successfully');</script>";
    $admin->redirect( '../viewsport' );
}
?>
