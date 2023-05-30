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
        <form action='Controller/addsport.php' method='POST'>
<h1>ADD SPORT</h1><br>
            <div class='row'>
                <label>SPORT NAME</label>
                <input type='text' name='sname' placeholder='Enter the sport name'>
            </div>
            <div class='row'>
                <label>TYPE</label>
                <select name="type">
                <option selected disabled>Choose the sports type</option>
                    <option value='indore'>indoor</option>
                    <option value='outdoor'>outdoor</option>
                </select>
            </div><br>
            <div class='row'>
                <input type='submit' name='save' value='Submit'>
            </div>
        </form>

    </div>

</body>

</html>
<!-- end document-->