<?php
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
include 'admin.php'

//  $control->isLogged( 'admin', 'admin/index' );

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
<title>VIEW EVENT</title>
</head>
<body>
<div class = 'container'>
<h3>VIEW EVENT</h3>
<div>
            <a href='admin.php'>
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
<th>Event Name</th>
<th>Place</th>
<th>Date</th>
<th>SPORT</th>
<th class = 'symbol'>Delete</th>
<th class = 'symbol'>Edit</th>
</tr>
</thead>
<tbody>

<?php
$i = 1;
$stmt = $admin->ret( 'SELECT * FROM `event`' );
while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    ?>

    <tr>
    <td><?php echo $i++;
    ?></td>
    <td><?php echo $row[ 'ename' ];
    ?></td>
    <td><?php echo $row[ 'place' ];
    ?></td>
    <td><?php echo $row[ 'date' ];
    ?></td>
    <td><?php echo $row[ 'sport' ];
    ?></td>
    <td class = 'symbol'><a href = "Controller/eventdelete.php?id=<?php echo $row['eid']; ?>" OnClick = "return confirm('are you sure')"><span class = 'material-symbols-outlined dlt'>delete</span></a></td>
    <td class = 'symbol'><a href = "eventupdate.php?id=<?php echo $row['eid']; ?>" ><span class = 'material-symbols-outlined edt'>edit</span></a></td>
    </tr>

    <?php  }
    ?>
    </tbody>

    </table>
    </body>

    </html>