<?php
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
include 'index.php';

$id= $_SESSION['id'];
$stmt = $admin->ret( "SELECT * FROM `player` where `pid`='$id'" );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
$sport= $row['sport'];

?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>
<meta name = 'description' content = 'au theme template'>
<meta name = 'author' content = 'Hau Nguyen'>
<meta name = 'keywords' content = 'au theme template'>
<link rel = 'stylesheet' href = 'css/style.css'/>
<link rel = 'stylesheet' href = 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />
<title>VIEW ACHIEVEMENT</title>
</head>
<body>
<div class = 'container'>
<h3>VIEW ACHIEVEMENT</h3>
<div>
            <a href='index.php'>
            <span class="material-symbols-outlined back">
arrow_back
</span></a>
<br>
<br>
        </div>

<table class = 'content-table ' id = 'example' >
<thead>
<tr>
<th>SL.NO</th>
<th>PID</th>
<th>SPORT</th>
<th>COMPETITION</th>
<th>LEVEL</th>
<th>POSITION</th>
<th>YEAR</th>

</tr>
</thead>
<tbody>

<?php
$i = 1;
$stmt = $admin->ret( "SELECT * FROM `achivements`where pid='$id'" );
while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    ?>

    <tr>
    <td><?php echo $i++;
    ?></td>
    <td><?php echo $row[ 'pid' ];
    ?></td>
    <td><?php echo $row[ 'sport' ];
    ?></td>
    <td><?php echo $row[ 'competition' ];
    ?></td>
    <td><?php echo $row[ 'level' ];
    ?></td>
    <td><?php echo $row[ 'position' ];
    ?></td>
    <td><?php echo $row[ 'year' ];
    ?></td>
    
    </tr>

    <?php  }
    ?>
    </tbody>

    </table>
    </body>

    </html>
