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
<title>VIEW SPORT DETAILS</title>
<link rel = 'stylesheet' href = 'css/style.css'>
<link rel = 'stylesheet'
href = 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />
</head>

<body>
<div class = 'container'>
<h3>VIEW SPORT DETAILS</h3>
<div>
            <a href='admin.php'>
            <span class="material-symbols-outlined back">
arrow_back
</span></a>
<br>
<br>
        </div>
<table class = 'content-table ' id = 'example'>
<thead>
<tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>TYPE</th>
<th>NO OF PLAYERS</th>
<th>Delete</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$stmt = $admin->ret( 'SELECT * FROM `sport`' );
while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    ?>
    <tr>
    <td>
    <?php echo $i++;
    ?>
    </td>
    <td>
    <?php echo $row[ 'sname' ];
    ?>
    </td>
    <td>
    <?php echo $row[ 'type' ];
    ?>
    </td>
    <td>
    <?php echo $row[ 'pnumber' ];
    ?>
    </td>

    <td class = 'symbol'><a href = "Controller/sportdelete.php?id=<?php echo $row['sid']; ?>" OnClick = "return confirm('are you sure')">
    <span
    class = 'material-symbols-outlined dlt'>delete</span></a></td>
    <td class = 'symbol'><a href = "sportupdate.php?id=<?php echo $row['sid']; ?>" >
    <span
    class = 'material-symbols-outlined edt'>edit</span></a></td>
    </tr>
    <?php }
    ?>
    </tbody>
    </table>
    </body>
    </html>