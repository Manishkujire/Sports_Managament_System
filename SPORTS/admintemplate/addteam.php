<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';
$control = new Controller();
$set = 0;
$admin = new Admin();
$q = $admin->ret( 'select * from `team` order by `tid` desc limit 1' );
$row = $q->fetch( PDO::FETCH_ASSOC );
$last_id = $row[ 'tid' ];
if ( $row >0 )
 {
    $tid = substr( $last_id, 4 );
    $tid = intval( $tid );
    $tid = 'TEAM'.( $tid + 1 );
} else {
    $tid = 'TEAM1';

}
echo $tid;
?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Document</title>
</head>
<body>
<div class = 'container'>
<form action = 'Controller/addteam.php?tid=<?php echo $tid;?>' method = 'post'>
<div class = 'row'>
<label>SPORT</label>
<select name = 'sport' >
<option selected disabled>Choose the sports</option>
<?php
$query = $admin->ret( 'SELECT * FROM `sport`' );
while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ) {
    ?>
    <option value = '<?php echo $sport['sname'];?>'><?php echo $sport[ 'sname' ];
    ?></option>
    <?php }
    ?>
    </select>
    </div>
    <div class = 'row'>
    <label>p1</label>
    <select name = 'player1' >
    <option selected disabled >choose leader</option>

    <?php
    $query1 = $admin->ret( 'SELECT * FROM `player` where `tid` is null' );
    while( $p1 = $query1->fetch( PDO::FETCH_ASSOC ) ) {
        ?>
        <option value = '<?php echo $p1['name'];?>'><?php echo $p1[ 'name' ];
        ?></option>
        <?php
    }
    ?>
    </select>
    </div>
    <div class = 'row'>
    <label>p2</label>
    <select name = 'player2' >
    <option selected disabled >choose leader</option>

    <?php
    $query1 = $admin->ret( 'SELECT * FROM `player` where `tid` is null' );
    while( $p1 = $query1->fetch( PDO::FETCH_ASSOC ) ) {
        ?>
        <option value = '<?php echo $p1['name'];?>'><?php echo $p1[ 'name' ];
        ?></option>
        <?php
    }
    ?>
    </select>
    </div>
    <div class = 'row'>
    <label>p3</label>
    <select name = 'player3' >
    <option selected disabled >choose leader</option>

    <?php
    $query1 = $admin->ret( 'SELECT * FROM `player` where `tid` is null' );
    while( $p1 = $query1->fetch( PDO::FETCH_ASSOC ) ) {
        ?>
        <option value = '<?php echo $p1['name'];?>'><?php echo $p1[ 'name' ];
        ?></option>
        <?php
    }
    ?>
    </select>
    </div>
    <div class = 'row'>
    <label>p4</label>
    <select name = 'player4' >
    <option selected disabled >choose leader</option>

    <?php
    $query1 = $admin->ret( 'SELECT * FROM `player` where `tid` is null' );
    while( $p1 = $query1->fetch( PDO::FETCH_ASSOC ) ) {
        ?>
        <option value = '<?php echo $p1['name'];?>'><?php echo $p1[ 'name' ];
        ?></option>
        <?php
    }
    ?>
    </select>
    </div>
    <div class = 'row'>
    <label>LEADER</label>
    <select name = 'leader' >
    <option selected disabled >choose leader</option>

    <?php
    $query1 = $admin->ret( 'SELECT * FROM `player` where `tid` is null' );
    while( $p1 = $query1->fetch( PDO::FETCH_ASSOC ) ) {
        ?>
        <option value = '<?php echo $p1['name'];?>'><?php echo $p1[ 'name' ];
        ?></option>
        <?php
    }
    ?>
    </select>
    </div>

    <div class = 'row'>
    <input type = 'submit' name = 'save' value = 'submit'>
    </div>
    </form>
    </div>
    </body>
    </html>