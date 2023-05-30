<?php

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
    require_once 'admin.php';

$id = $_GET [ 'id' ];
$stmt = $admin->ret( 'SELECT * FROM `achivements` where achid='.$id );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
    <div class="container">
        <form action='Controller/achiveupdate.php?id=<?php echo $row['achid'];?>' method = 'POST'>
            <h1>UPDATE ACHIVEMENT</h1><br>
            <div class='row'>
                <label>PID</label>
                <select name="pid" value='<?php echo $row['pid'];?>'>
                    <?php 
                    $query = $admin->ret( 'SELECT * FROM `player` order by `usn`' );
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
                <select name="sport" value='<?php echo $row['sport']; ?>'>
                    <?php 
                    $query = $admin->ret( 'SELECT * FROM `sport`' );
                    while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ){
                         ?>
                    <option value='<?php echo $sport['sname'];?>'><?php echo $sport['sname'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class='row'>
                <label>COMPETITION</label>
                <input type='text' name='competition' placeholder='Enter the competition name' value='<?php echo $row['competition'];?>'>
            </div>
            <div class='row'>
                <label>LEVEL</label>
                <select name="level" value='<?php echo $row['level']; ?>'>
                    <option value='Zonal level'>Zonal level</option>
                    <option value='Taluk level'>Taluk level</option>
                    <option value='District level'>District level</option>
                    <option value='State levelle'>State level</option>
                    <option value='National level'>National level</option>
                </select>
            </div>

            <div class='row'>
                <label>POSITION</label>
                <input type='number' name='position' placeholder='Enter the position' value='<?php echo $row['position'];?>'>
            </div>
            <div class='row'>
                <label>YEAR</label>
                <input type='number' name='year' placeholder='Enter the year' value='<?php echo $row['year'];?>'>
            </div>
            <br>
            <div class='row'>
                <input type='submit' name='update' value='submit' class='btn btn-danger'>
            </div>

        </form>
    </div>
</body>

</html>