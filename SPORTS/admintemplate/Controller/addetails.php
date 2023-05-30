<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';
$control = new Controller();

$admin = new Admin();
if ( isset( $_POST[ 'save' ] ) )
 {
    $pid = $_POST[ 'pid' ];
    $name = $_POST[ 'name' ];
    $age = $_POST[ 'age' ];
    $usn = $_POST[ 'usn' ];
    $dob = $_POST[ 'dob' ];
    $gender = $_POST[ 'gender' ];
    $address = $_POST[ 'address' ];
    $phone = $_POST[ 'phone' ];
    $sport = $_POST[ 'sport' ];
    $email = $_POST[ 'email' ];
    $password = md5($_POST[ 'password' ]);
    $stmt = $admin->cud( "INSERT INTO `player`(`pid`,`name`,`age`,`dob`,`gender`,`address`,`phone`,`sport`,`email`,`password`) VALUES ('".$pid."','".$name."','".$age."','".$dob."','".$gender."','".$address."','".$phone."','".$sport."','".$email."','".$password."')", 'saved' );
    echo "<script>alert('data saved');</script>";
    $admin->redirect( '../viewdetails' );
}
?>