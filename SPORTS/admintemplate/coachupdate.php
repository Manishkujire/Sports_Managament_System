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
$stmt = $admin->ret( 'SELECT * FROM `coaches` where cid='.$id );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
<div class="container">
<form action ='Controller/coachupdate.php?id=<?php echo $row['cid'];?>' method = 'POST'>
<h1>COACH UPDATE</h1><br>
<div class = 'row'>
<label>NAME</label>

<input type = 'text' name = 'name' placeholder = 'Enter the name' value = "<?php echo $row['name'];?>" pattern="[A-Za-z]+" required title="letters only"
>
</div>
<div class = 'row'>
<label>AGE</label>
<input type = 'number' name = 'age' placeholder = 'Enter the age' value = '<?php echo $row['age']; ?>'>
</div>
<div class = 'row'>
<label>gender</label>
<select name = 'gender' value = '<?php echo $row['gender']; ?>'>
<option value = 'male'>Male</option>
<option value = 'female'>Female</option>
</select>
</div>

<div class = 'row'>
<label>ADDRESS</label>
<input type = 'text' name = 'address' placeholder = 'Enter the address' value = '<?php echo $row['address']; ?>'>
</div>
<div class = 'row'>
<label>PHONE NUMBER</label>
<input type = 'text' name = 'phone' placeholder = 'Enter phone number' value = '<?php echo $row['phone']; ?>'pattern="^\d{10}$" required title="10 numeric characters only"
>
</div>
<div class='row'>
                <label>SPORT</label>
                <select name="sport">
                    <?php 
                    $query = $admin->ret( 'SELECT * FROM `sport`' );
                    while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ){
                         ?>
                    <option value='<?php echo $sport['sname'];?>'><?php echo $sport['sname'];?></option>
                    <?php } ?>
                </select>
            </div>
<div class = 'row'>
<label>EMAIL</label>
<input type = 'email' name = 'username' placeholder = 'Enter the email' value = '<?php echo $row['username']; ?>'pattern = "[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$">
</div>
<div class = 'row'>
<label>PASSWORD</label>
<input type = 'text' name = 'password' placeholder = 'Enter the password' value = '<?php echo $row['password']; ?>'><br>
</div>
<input type = 'submit' name = 'update' value = 'submit' class = 'btn btn-danger'>
</div>
</form>
</div>
</body>

</html>