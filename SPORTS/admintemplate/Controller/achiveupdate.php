<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();

if ( isset( $_POST[ 'update' ] ) )
 {
    $id = $_GET[ 'id' ];
	$pid=$_POST['pid'];
	$sport=$_POST['sport'];
	$competition=$_POST['competition'];
	$level=$_POST['level'];
	$position=$_POST['position'];
	$year=$_POST['year'];
    $stmt = $admin->cud( "UPDATE `achivements` SET `pid` = '$pid',`sport` = '$sport',`competition` = '$competition',`level` = '$level',`position` = '$position',`year` = '$year' WHERE `achid`='$id'", 'updated' );
    echo "<script>alert('data updated successfully');</script>";
    $admin->redirect( '../viewachive' );
}
?>

