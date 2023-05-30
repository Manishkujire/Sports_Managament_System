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
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content='au theme template'>
    <meta name='author' content='Hau Nguyen'>
    <meta name='keywords' content='au theme template'>
    <title>sports management
    </title>
    <link rel="stylesheet" href="css/add.css">

</head>

<body>
    <?php include 'admin.php' ?>

    <div class='container'>
        <form action='Controller/addevent.php' method='POST'>
        <h1>ADD EVENT</h1>
<br>
            <div class='row'>
                <label>EVENT NAME</label>
                <input type='text' name='ename' placeholder='Enter the event name'>
            </div>
            <div class='row'>
                <label>PLACE</label>
                <input type='text' name='place' placeholder='Enter the venue'>
            </div>
            <div class='row'>
                <label>DATE</label>
                <input type='date' name='date' >
            </div>
            <div class='row'>
                <label>SPORT</label>
                <select name="sport">
                    <option selected disabled>Choose the sports</option>
                    <?php 
                    $query = $admin->ret( 'SELECT * FROM `sport`' );
                    while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ){
                         ?>
                    <option value='<?php echo $sport['sname'];?>'><?php echo $sport['sname'];?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <div class='row'>
                <input type='submit' name='save' value='Submit'>
            </div>
        </form>

    </div>

</body>

</html>
