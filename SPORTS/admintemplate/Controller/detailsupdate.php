<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();

if ( isset( $_POST[ 'update' ] ) )
 {
    $pid = $_GET[ 'id' ];
    $name = $_POST[ 'name' ];
    $age = $_POST[ 'age' ];
    $dob = $_POST[ 'dob' ];
    $gender = $_POST[ 'gender' ];
    $address = $_POST[ 'address' ];
    $phone = $_POST[ 'phone' ];
    $sport = $_POST[ 'sport' ];
    $email = $_POST[ 'email' ];
    $password = md5($_POST[ 'password' ]);
    echo $phone;
    $stmt = $admin->cud( "UPDATE `player` SET `pid`='$pid',`name` = '$name',`age` = '$age',`dob` = '$dob',`gender` = '$gender',`address` = '$address',`phone`= '$phone',`sport` = '$sport',`email` = '$email' ,`password` = '$password' WHERE `pid`='$pid'", 'updated' );
    echo "<script>alert('data updated successfully');</script>";
    $admin->redirect( '../viewdetails' );
}
?>

