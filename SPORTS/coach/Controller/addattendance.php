<?php
define( 'DIR', '../' );
require_once DIR . 'config.php';

$control = new Controller();

$admin = new Admin();

if ( isset( $_POST[ 'save' ] ) )
 {
    $no = $_POST[ 'no' ];
    $date = date( 'Y/m/d' );
    // $date = $_POST['date'];
    $stmt1 = $admin->ret( "SELECT * FROM `attendance` where date='".$date."'" );
    $row = $stmt1->fetch( PDO::FETCH_ASSOC );
    $num = $stmt1->rowCount();
    if ( $num <= 0 ) {
        for ( $i = 1; $i<$no; $i++ ) {
            $name = $_POST[ 'name'.$i ];
            $sport = $_POST[ 'sport'.$i ];
            $pid = $_POST[ 'pid'.$i ];
            $status = $_POST[ 'status'.$i ];
            echo $pid.'<br>';
            echo $name.'<br>';
            echo $sport.'<br>';
            echo $status.'<br>';
            $stmt = $admin->cud( "INSERT INTO `attendance`(`pid`,`name`,`sport`,`status`,`date`) VALUES ('".$pid."','".$name."','".$sport."','".$status."','".$date."')", 'saved' );

        }
        echo "<script>alert('data saved');</script>";
        $admin->redirect( '../viewatt' );
    } else {
        echo "<script>alert('attendance taken for todays session');window.location='../viewatt.php';</script>";
    }
}

?>