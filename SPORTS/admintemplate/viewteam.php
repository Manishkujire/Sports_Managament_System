<?php
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
include 'admin.php'
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content='au theme template'>
    <meta name='author' content='Hau Nguyen'>
    <meta name='keywords' content='au theme template'>
    <title>VIEW DETAILS</title>
    <link rel='stylesheet' href='css/team.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />
</head>

<body>
    <div class='container'>
        <h3>VIEW DETAILS</h3>
        <div>
            <a href='admin.php'>
                <span class='material-symbols-outlined back'>
                    arrow_back
                </span></a>
            <br>
            <br>
        </div>
        <div class="content">
            <?php for($i=0;$i<7;$i++){ ?>
            <div class="content-box">
                <div class="label">
                    <label>Team1</label>
                </div>
                <div class="members">
                    <label class="mem">m1</label>
                    <label class="mem">m2</label>
                    <label class="mem">m3</label>
                    <label class="mem">m4</label>
                </div>
            </div>
            <?php } ?>
        </div>
</body>

</html>