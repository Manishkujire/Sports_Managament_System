<?php
define( 'DIR', '../' );
require_once DIR .'config.php';
$contol = new Controller();
$admin = new Admin();
if ( isset( $_POST[ 'sub' ] ) ) 
 {
    if ( $_POST[ 'type' ] == 'admin' ) {
        $name = $_POST[ 'username' ];
        $password = $_POST[ 'password' ];
        $stmt = $admin->ret( "SELECT * FROM `admin` where email='$name' and pass='$password'" );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );

        $num = $stmt->rowCount();
        if ( $num ) {
            $_SESSION[ 'id' ] = $row[ 'id' ];
            $admin->redirect( '../admintemplate/admin' );
        } else {
            echo $name.'please check yourtyxfjclc username and password'.$password;
            //$admin->redirect( '../login' );
        }
    } elseif ( $_POST[ 'type' ] == 'coach' ) {
        $stmt = $admin->ret( "SELECT * FROM `coaches` where username='$name' and `password`='$password'" );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );
        $num = $stmt->rowCount();
        if ( $num ) {
            $_SESSION[ 'id' ] = $row[ 'cid' ];
            $admin->redirect( '../coach/index' );
        } else {
            echo 'please check your username and password';
            $admin->redirect( '../login' );
        }
    } elseif ( $_POST[ 'type' ] == 'player' ) {

        $stmt = $admin->ret( "SELECT * FROM `player` where email='$name' and `password`='$password'" );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );

        $num = $stmt->rowCount();
        if ( $num ) {
            $_SESSION[ 'id' ] = $row[ 'pid' ];
            $admin->redirect( '../student/index' );
        } else {
            echo 'please check your username and password';
            $admin->redirect( '../login' );

        }
    }
}

?>