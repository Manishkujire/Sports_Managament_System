<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();

if ( isset( $_POST[ 'update' ] ) )
 {
    $pid = $_SESSION[ 'id' ];
    $q = $admin->ret( "select * from player where pid='$pid'" );
    $row = $q->fetch( PDO::FETCH_ASSOC );
    $oldpass = $_POST[ 'oldpass' ];
    $newpass = $_POST[ 'newpass' ];
    $cpass = $_POST[ 'cpass' ];
    if ( $oldpass == $row[ 'password' ] ) {
        if ( $newpass == $cpass ) {
            $stmt = $admin->cud( "UPDATE `player` SET `password`='$newpass' WHERE `pid`='$pid'", 'updated' );
        } else {
            echo 'Confirm password did not matched';
            $admin->redirect( 'changepass' );

        }

    } else {
        echo 'Incorrect old password';
        $admin->redirect( 'changepass' );
    }
}
?>

