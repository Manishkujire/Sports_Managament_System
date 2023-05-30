<?php
/**
* Created by PhpStorm.
* User: your name
* Date: todays date
* Time: todays time
*/
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
// $control->isLogged( 'admin', 'admin/index' );
?>
<!DOCTYPE html>
<html>

<head>
<title>DETAILS</title>

<body>

<?php
$id = $_GET [ 'id' ];
$stmt = $admin->ret( 'SELECT * FROM `sport` where sid='.$id );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
<form action = 'Controller/sportupdate.php?id=<?php echo $row['sid'];?>' method = 'POST'>
<div class = 'row'>
<label>sport name</label>
<input type = 'text' name = 'sname' placeholder = 'enter name' value='<?php echo $row['sname'];?>'>
</div>
<div class = 'row'>
<label>TYPE</label>
<select name = 'type'value='<?php echo $row['type'];?>'>>
<option selected disabled>Choose the sports type</option>
<option value = 'indore'>indore</option>
<option value = 'outdoor'>outdoor</option>
</select>
</div>
<input type = 'submit' name = 'update' value = 'submit' class = 'btn btn-danger'>
</div>
</form>
</body>

</html>