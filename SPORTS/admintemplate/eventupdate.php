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
include 'admin.php'
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
$stmt = $admin->ret( 'SELECT * FROM `event` where eid='.$id );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
<div class="container">
<form action = 'Controller/eventupdate.php?id=<?php echo $row['eid'];?>' method = 'POST'>
<h1>EVENT UPDATE</h1>
<br>
<div class = 'row'>
<label>EVENT NAME</label>
<input type = 'text' name = 'ename' placeholder = 'Enter the name'value="<?php echo $row['ename'];?>">
</div>
<div class = 'row'>
<label>PLACE</label>
<input type = 'text' name = 'place' placeholder = 'Enter the venue'value="<?php echo $row['place'];?>">
</div>
<div class = 'row'>
<label>DATE</label>
<input type = 'date' name = 'date' value="<?php echo $row['date'];?>">
</div>
<div class = 'row'>
<label>SPORT</label>
<select name = 'sport' value="<?php echo $row['sport'];?>">
<?php
$query = $admin->ret( 'SELECT * FROM `sport`' );
while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ) {
?>
    <option value = '<?php echo $sport['sname'];?>'><?php echo $sport[ 'sname' ];
    ?></option>
    <?php }
    ?>
    </select>
    </div><br>
    <div class = 'row'>

    <input type = 'submit' name = 'update' value = 'submit' class = 'btn btn-danger'>
    </div>
    </form>
    </div>
    </body>

    </html>