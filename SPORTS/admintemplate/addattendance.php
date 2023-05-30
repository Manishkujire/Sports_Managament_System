
<?php
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
include 'admin.php'

//  $control->isLogged( 'admin', 'admin/index' );

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content='au theme template'>
    <meta name='author' content='Hau Nguyen'>
    <meta name='keywords' content='au theme template'>
    <title>VIEW COACHES</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />
</head>

<body>
    <div class='container'>
        <h3>ADD ATTENDANCE</h3>
        <div>
            <a href='admin.php'>
            <span class="material-symbols-outlined back">
arrow_back
</span></a>
<br>
<br>
        </div>
        <form class='att-form' action='Controller/addattendance.php' method='POST'>
        <br><div class="row">
        <input type='date' name='date'>
        </div>
        <br><br>
        <table class='content-table ' id='example'>
            <thead>
                <tr>
                    <th>SL.No</th>
                    <th>PID</th>
                    <th>Name</th>
                    <th>SPORT</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php
$i = 1;
$stmt = $admin->ret( 'SELECT * FROM `PLAYER`' );
while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    ?>
                <tr>
                <input type='hidden' value="<?php echo $row['sport']; ?>" name="sport<?php echo $i; ?>">
                    <input type='hidden' value="<?php echo $row['name']; ?>" name="name<?php echo $i; ?>">
                    <input type='hidden' value="<?php echo $row['pid']; ?>" name="pid<?php echo $i; ?>">
                    <td>
                        <?php echo $i;
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'pid' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'name' ];
    ?>
                    </td>
                    <td>
                        <?php echo $row[ 'sport' ];
    ?>
                    </td>
                    <td>
                    <div class='status'>
                        <div class='status-content'>
                            <label>present</label>
                            <input type='radio' name="status<?php echo $i;?>" checked value='present'>
                        </div>
                        <div class='status-content'>
                            <label>absent</label>
                            <input type='radio' name="status<?php echo $i;?>"  value='absent'>
                        </div>
                    </div>
                    </td>
                    
                </tr>
                <?php $i++; }
    ?>
            </tbody>
        </table>
        <input type='hidden' name='no' value="<?php echo $i;?>">
        <br>
            <div class='row'>
                <input type='submit' name='save' value='SUBMIT'>
                </div>
</form>
</div>
</body>
</html>