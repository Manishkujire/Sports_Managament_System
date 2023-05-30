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
include 'admin.php';
// $control->isLogged( 'admin', 'admin/index' );
?>
<!DOCTYPE html>
<html>

<head>
<title>DETAILS</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/add.css">
</head>
<body>

<?php
$id = $_GET [ 'id' ];
$stmt = $admin->ret( 'SELECT * FROM `sport` where sid='.$id );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
<div class="container">
<form action = 'Controller/sportupdate.php?id=<?php echo $row['sid'];?>' method = 'POST'>
<h1>UPDATE SPORT</h1><br>
<div class = 'row'>
<label>SPORT NAME</label>
<input type = 'text' name = 'sname' placeholder = 'Enter the sport name' value='<?php echo $row['sname'];?>'>
</div>
<div class = 'row'>
<label>TYPE</label>
<select name = 'type'value='<?php echo $row['type'];?>'>>
<option value = 'Indoor'>Indoor</option>
<option value = 'Outdoor'>Outdoor</option>
</select>
<br>
</div>
<input type = 'submit' name = 'update' value = 'submit' class = 'btn btn-danger'>
</div>
</form>
</div>
</body>

</html>