<?php

define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
include 'index.php';
?>
<!DOCTYPE html>
<html>

<head>
<title>DETAILS</title>
<link rel = 'stylesheet' href = 'css/style.css'>
<link rel = 'stylesheet' href = 'css/add.css'>
</head>
<body>

<?php
$cid = $_SESSION [ 'id' ];
$stmt = $admin->ret( "SELECT * FROM `coaches` where `cid`='$cid.'" );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
<div class = 'container'>
<form action = '' method = 'POST'>
<h1>UPDATE PLAYER DETAILS</h1>
<br>
<div class = 'row'>
<label>CID</label>
<label><?php echo $cid;
?></label>
</div>
<div class = 'row'>
<label>NAME</label>
<input type = 'text' name = 'name' value = "<?php echo $row['name'];?>" readonly = ''>
</div>
<div class = 'row'>
<label>OLD PASSWORD</label>
<input type = 'text' autocomplete = 'off' name = 'oldpass' autocomplete = 'off'placeholder = 'Enter the old password'>
</div>
<div class = 'row'>
<label>NEW PASSWORD</label>
<input type = 'text' autocomplete = 'off' name = 'newpass' placeholder = 'Enter the new password' >
</div>
<div class = 'row'>
<label>CONFIRM PASSWORD</label>
<input type = 'text'autocomplete = 'off' name = 'cpass' placeholder = 'Confirm the password' >
</div>
<div class = 'row'>
<br>
<input type = 'submit' name = 'update' value = 'SUBMIT' class = 'btn btn-danger'>
</div><br><br><br>
<label ><?php
if ( isset( $_POST[ 'update' ] ) )
 {
    $q = $admin->ret( "select * from coaches where cid='$cid'" );
    $row = $q->fetch( PDO::FETCH_ASSOC );
    $oldpass = $_POST[ 'oldpass' ];
    $newpass = $_POST[ 'newpass' ];
    $cpass = $_POST[ 'cpass' ];
    if ( md5($oldpass) == $row[ 'password' ] ) {
        if ( !empty($newpass)&&( $newpass == $cpass )) {
            $pass=md5($newpass);
            $stmt = $admin->cud( "UPDATE `coaches` SET `password`='$pass' WHERE `cid`='$cid'", 'updated' );
            $admin->redirect( 'index' );

        } else {
            echo 'Confirm password did not matched';

        }

    } else {
        echo 'Incorrect old password';
    }
}
?></label>

</form>
</div>
</body>

</html>