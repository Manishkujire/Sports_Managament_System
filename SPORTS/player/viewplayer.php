<?php
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
$id= $_SESSION['id'];
include 'sidebar.php';
$stmt = $admin->ret( 'SELECT * FROM `player` where `pid`='.$id.'' );
$row = $stmt->fetch( PDO::FETCH_ASSOC );

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
<title>sports management</title>
</head>
<body>
<div class = 'container'>
<h3>VIEW ACHIEVEMENT</h3>
<br>
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
<th>Name</th>
                    <th>USN</th>
                    <th>AGE</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th>GENDER</th>
                    <th>PHONE</th>
                    <th>SPORT</th>
</tr>
</thead>
<tbody>

<?php
$i = 1;
$stmt = $admin->ret( 'SELECT * FROM `player` where `sport`="'.$row['sport'].'"' );
while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    ?>

    <tr>
                    <td>
                        <?php echo $row[ 'name' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'usn' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'age' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'dob' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'address' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'gender' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'phone' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'sport' ];
    ?>
                    </td>
    </tr>

    <?php  }
    ?>
    </tbody>

    </table>
    </body>

    </html>
