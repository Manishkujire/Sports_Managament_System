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
$pid = $_SESSION [ 'id' ];
$stmt = $admin->ret( 'SELECT * FROM `player` where `pid`="'.$pid.'";' );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
<div class = 'container'>
<form action = '' method = 'POST'>
<h1>UPDATE PLAYER DETAILS</h1>
<br>
<div class = 'row'>
<label>PID</label>
<label><?php echo $pid;
?></label>
</div>
<div class = 'row'>
<label>NAME</label>
<input type = 'text' name = 'name' placeholder = 'enter the name' value = "<?php echo $row['name'];?>" readonly = ''>
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
    $q = $admin->ret( "select * from player where pid='$pid'" );
    $row = $q->fetch( PDO::FETCH_ASSOC );
    $oldpass = $_POST[ 'oldpass' ];
    $newpass = $_POST[ 'newpass' ];
    $cpass = $_POST[ 'cpass' ];
    if ( $oldpass == $row[ 'password' ] ) {
        if ( $newpass == $cpass ) {
            $stmt = $admin->cud( "UPDATE `player` SET `password`='$newpass' WHERE `pid`='$pid'", 'updated' );
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