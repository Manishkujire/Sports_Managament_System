<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';
$control = new Controller();

$admin = new Admin();
if ( isset( $_POST[ 'update' ] ) )
 {
    # code...
    $id = $_GET[ 'id' ];

    $ename = $_POST[ 'ename' ];
    $date = $_POST[ 'date' ];
    $place = $_POST[ 'place' ];
    $sport = $_POST[ 'sport' ];
    $stmt = $admin->cud( "UPDATE `event` SET `ename`='".$ename."',`date`='".$date."',`place`='".$place."',`sport`='".$sport."' WHERE eid=".$id, 'updated' );
        echo "<script>alert('data updated successfully');</script>";
             $admin->redirect( '../viewevent' );
}
?>