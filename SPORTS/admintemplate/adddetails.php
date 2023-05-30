<?php

define( 'DIR', '' );
require_once DIR . 'config.php';

$control = new Controller();

$admin = new Admin();
$q = $admin->ret( 'select * from `player` order by `pid`' );
$i = 0;
if($q->rowcount()>0){
while( $row = $q->fetch( PDO::FETCH_ASSOC ) ) {
    $i++;
    $pid = $row[ 'pid' ];
    $p = substr( $pid, 1 );
    $p = intval( $p );
    if ( $i != $p ) {
        $pid = $i;
        $pid = 'P'.$pid;
        break;
    }
    $pid = 'P'.( $i+1 );
}}
else $pid="P1";
?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>
<meta name = 'description' content = 'au theme template'>
<meta name = 'author' content = 'Hau Nguyen'>
<meta name = 'keywords' content = 'au theme template'>
<title>sports management
</title>
<link rel = 'stylesheet' href = 'css/add.css'>

</head>

<body>
<?php include 'admin.php' ?>
<div class = 'container'>
<form action = 'Controller/addetails.php' method = 'POST'>
<h1>ADD PALYER</h1>
<div class = 'row'>
<label>PID</label>
<input  name = 'pid' value = "<?php echo $pid;?>" readonly = ''>
</div>

<div class = 'row'>
<label>NAME</label>
<input type = 'text' name = 'name' placeholder = 'Enter the name' pattern="[A-Za-z]+" required title="letters only">
</div>

<div class = 'row'>
<label>AGE</label>
<input type = 'number' name = 'age' placeholder = 'Enter ther age'>
</div>
<div class = 'row'>
<label>DOB</label>
<input type = 'date' name = 'dob'>
</div>
<div class = 'row'>
<label>GENDER</label>
<select name = 'gender'>
<option selected disabled>Choose the gender</option>
<option value = 'male'>male</option>
<option value = 'female'>female</option>
</select>
</div>

<div class = 'row'>
<label>ADDRESS</label>
<input type = 'text' name = 'address' placeholder = 'Enter the address'>
</div>
<div class = 'row'>
<label>PHONE NUMBER</label>
<input type = 'number' name = 'phone' placeholder = 'Enter the Ph.No'pattern="^\d{10}$" required title="10 numeric characters only"
>
</div>
<div class = 'row'>
<label>SPORT</label>
<select name = 'sport'>
<option selected disabled>Choose the sport</option>
<?php
$query = $admin->ret( 'SELECT * FROM `sport`' );
while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ) {
    ?>
    <option value = '<?php echo $sport['sname'];?>'>
    <?php echo $sport[ 'sname' ];
    ?>
    </option>
    <?php }
    ?>
    </select>
    </div>
    <div class = 'row'>
    <label>EMAIL</label>
    <input type = 'text' name = 'email' placeholder = 'Enter the email'>
    </div>
    <div class = 'row'>
    <label>PASSWORD</label>
    <input type = 'text' name = 'password' placeholder = 'Enter the password'>
    </div>
    <div class = 'row'>
    <input type = 'submit' name = 'save' value = 'SUBMIT'>
    </div>
    </form>

    </div>
    </body>
    </html>