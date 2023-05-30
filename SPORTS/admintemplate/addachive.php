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
$set='0';
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
        <form action='Controller/addachive.php' method='POST'>
<h1>ADD ACHIVEMENT</h1><br>
            <div class='row'>
                <label>PID</label>
                <select name="pid" >
                    <option selected disabled>Choose the PID</option>
                    <?php 
                    $query = $admin->ret( 'SELECT * FROM `player` order by `pid`' );
                    while( $player = $query->fetch( PDO::FETCH_ASSOC ) ){
                         ?>
                    <option value='<?php echo $player['pid'];?>'>
                        <?php echo $player['pid'];?>
                    </option>
                    <?php } ?>
             </select>
            </div>
            <div class='row'>
                <label>SPORT</label>
                <select name="sport">
                    <option selected disabled>Choose the sports</option>
                    <?php 
                    $query = $admin->ret( 'SELECT * FROM `sport`' );
                    while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ){
                         ?>
                    <option value='<?php echo $sport['sname'];?>'>
                        <?php echo $sport['sname'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class='row'>
                <label>COMPETITION</label>
                <input type='text' name='competition' placeholder='Enter the event name'>
            </div>
            <div class='row'>
                <label>LEVEL</label>
                <select name="level">
                    <option selected disabled>Choose the level</option>
                    <option value='Zonal level'>Zonal level</option>
                    <option value='Taluk level'>Taluk level</option>
                    <option value='District level'>District level</option>
                    <option value='State levelle'>State level</option>
                    <option value='National level'>National level</option>
                </select>
            </div>

            <div class='row'>
                <label>POSITION</label>
                <input type='number' name='position' placeholder='Enter the position aquired'>
            </div>
            <div class='row'>
                <label>YEAR</label>
                <input type='number' name='year' placeholder='Enter the year'>
            </div>
            <br>
            <div class='row'>
                <input type='submit' name='save' value='Submit'>
            </div>
        </form>

    </div>

</body>

</html>